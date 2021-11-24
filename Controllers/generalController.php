<?php
require_once './Models/resourcesModel.php';
require_once './Models/generalModel.php';
require_once './Views/generalView.php';
require_once './Helpers/AuthHelper.php';

class generalController{

    private $modelR;
    private $modelG;
    private $view;
    private $authHelper;

    function __construct() {
        $this->modelR = new resourcesModel();
        $this->modelG = new generalModel();
        $this->view = new generalView();
        $this->authHelper = new AuthHelper();
    }

    public function goToLogin(){
        $this->view->renderLogin();
    }

    public function verifyLogin($email, $password){
        $u = $email; // email ingresado por el usuario
        $p = $password; //password ingresado por el usuario

        $dbUser = $this->modelG->getUserByEmail($u);
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
        } 
		if (isset($_SESSION['admin'])) { // si estoy logueado como admin debería pasar parametro
            $this->view->renderNav($_SESSION['admin']);
		}
		else {
            $this->view->renderNav();
        }

        $resources = $this->modelR->getResources();
        $this->view->renderHome($resources);
    }

    public function goToRegisterUser() { //va al form para el registro
        $this->view->renderRegisterForm(); // de un user nuevo
    }

    public function registerUser() { 
        if ($_POST['password'] === $_POST['checkpassword']) { //si password y re-password son iguales cuando se ingresan...
            $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT); //se hace el hash del pass venido por POST
            $this->modelG->addUser($_POST['email'], $encryptedPass); //se manda al modelo el email venido por POST y la contraseña hasheada
            $this->verifyLogin($_POST['email'], $_POST['password']); //hace el verify para iniciar sesion ni bien se complete el registro   
        } else {
            $this->view->renderRegisterForm("Por favor, introduzca correctamente su contraseña"); //de aca puede venir el warning
        }
    }

    public function goToPanel() {
        if ($this->authHelper->checkIfAdminLogged()) { //chequeo si está sesionando el admin
            $admin = $_SESSION['admin'];
            $users = $this->modelG->getAllUsers(); //traigo todos los usuarios con todas las filas y columnas
            $this->view->renderPanel($users, $admin); //paso de params los usuarios y el session admin que es el email del admin (no olvidar que el session es como un arreglo asociativo)
        } else {
        $this->view->renderLogin();
        }
    }

    public function goToReviewsPanel(){
        if ($this->authHelper->checkIfAdminLogged()) {
            $reviews = $this->modelR->getAllReviews();
            $this->view->renderReviewsPanel($reviews);
        } else {
            $this->view->renderLogin();
        }
    }

    public function goToChangeStatus($id) { //aca viene el id del usuario a modificar en el panel
        if ($this->authHelper->checkIfAdminLogged()) { //aca se fija si está sesionando el admin
            $user = $this->modelG->getUserById($id); //trae un usuario unico por id

            if ($user->administrador == 1) { //si es admin...
                $this->modelG->updateStatus($id, 0); //lo hace usuario cambiando el booleano
            } else if ($user->administrador == 0) { //y si no...
                $this->modelG->updateStatus($id, 1); // al reves
            }
        } else {
            $this->view->renderLogin();
        }
                //al cambiar el status de alguien, refrescar la página con el USUARIO (kohaku por ejemplo) no alcanza para aplicar los cambios en la cuenta de esa persona. 
                //Es necesario desloguearse e iniciar sesion
        $this->goToPanel();
    }

    public function goToWarning($param1, $id) { // aca viene el param1 y id del usuario o la review
        if ($param1 == "zone" || $param1 == "panel") {
            $user = $this->modelG->getUserById($id); //trae el usuario por id
            $this->view->renderWarning($id, $user->email); //renderizo la advertencia con el email del usuario y el id por param
        } else if ($param1 == "review"){
            /* $this->view->renderWarning($id); */
            $this->view->renderWarningReviews($id);
        }
        
    }

    public function goToDeleteUser($id) { // viene el id del warning.tpl //la sesión de un usuario eliminado permanece abierta
        if ($this->authHelper->checkIfAdminLogged()) { // se hace un chequeo si sos admin
            $this->modelG->deleteUser($id); // se va al model y se elimina usuario por id
        } else {
            $this->view->renderLogin();
        }

        $this->goToPanel();
    }
}