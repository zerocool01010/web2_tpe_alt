<?php
/* require_once './Views/generalView.php'; */

class AuthHelper {

    /* private $view;

    function __construct() {
        $this->view = new generalView();
    } */
	
	public function checkIfLogged(){
        session_start();
        if (isset($_SESSION['user']) || !empty($_SESSION['user'])){
            /* $this->view->renderLogin(); */
            session_abort();
            return true;
        } else {
            session_abort();
            return false;
        }
        }
    
    public function checkIfAdminLogged(){
		session_start();
        if (isset($_SESSION['admin']) || !empty($_SESSION['admin'])){
            /* $this->view->renderLogin(); */
            session_abort();
            return true;
        } else {
            session_abort();
            return false;
        }
	}
	
}