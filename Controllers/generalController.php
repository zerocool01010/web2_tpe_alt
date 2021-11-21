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
        $u = $_POST['user'];
        $p = $_POST['password'];

        $dbUser = $this->modelG->getUser($u);
        $dbHash = $dbUser->pass;

        if (!empty($dbUser) && password_verify($p, $dbHash)) {
            session_start();
            $_SESSION['user'] = $dbUser->email; 
            header("Location:".BASE_URL."home");
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

        if (isset($_SESSION['user'])) { // si estoy logueado debería pasar parametro
            $this->view->renderNav($_SESSION['user']);
            $resources = $this->modelR->getResources();
            $this->view->renderHome($resources);
        } else {
            $this->view->renderNav();
            $resources = $this->modelR->getResources();
            $this->view->renderHome($resources);
        }
    }
}