<?php
require_once './Models/resourcesModel.php';
require_once './Models/generalModel.php';
require_once './Views/generalView.php';

class generalController{

    private $modelR;
    private $modelG;
    private $view;

    function __construct() {
        $this->modelR = new resourcesModel();
        $this->modelG = new generalModel();
        $this->view = new generalView();
    }

    public function goToLogin(){
        $this->view->renderLogin();
    }

    public function verifyLogin(){
        $u = $_POST['user']; // email ingresado por el usuario
        $p = $_POST['password']; //password ingresado por el usuario

        $dbUser = $this->modelG->getUser($u);
        $dbHash = $dbUser->pass; // en esta variable se guarda el hash traido de la db
		$boolAdmin = $dbUser->administrador; // en esta variable se guarda el valor booleano sobre admin traido de la db

        if (!empty($dbUser) && password_verify($p, $dbHash)) {
			if ($boolAdmin == 0) { //si el usuario no es admin...
				session_start();
				$_SESSION['user'] = $dbUser->email; 
				header("Location:".BASE_URL."home");
			}
			if ($boolAdmin == 1){ //si el usuario es admin...
				session_start();
				$_SESSION['admin'] = $dbUser->email; 
				header("Location:".BASE_URL."home");		
			}
        } else {
            $this->view->renderErrorPage();
        }
    }

    public function goToError(){
        $this->view->renderErrorPage();
    }

    public function logOut(){
        session_start();
        session_destroy();
        $this->view->renderLogin();
    }

    public function goToRenderHome() {
        session_start();

        if (isset($_SESSION['user'])) { // si estoy logueado como usuario debería pasar parametro
            $this->view->renderNav($_SESSION['user']);
            $resources = $this->modelR->getResources();
            $this->view->renderHome($resources);
        } 
		if (isset($_SESSION['admin'])) { // si estoy logueado como admin debería pasar parametro
            $this->view->renderNav($_SESSION['admin']);
            $resources = $this->modelR->getResources();
            $this->view->renderHome($resources);
		}
		else {
            $this->view->renderNav();
            $resources = $this->modelR->getResources();
            $this->view->renderHome($resources);
        }
    }
}