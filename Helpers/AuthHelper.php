<?php

class AuthHelper {
	
	public function checkIfLogged(){
        session_start();
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
            $this->view->renderLogin();
            die;
        }
    }
	
	public function checkIfAdminLogged(){
		session_start();
        if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])){
            $this->view->renderLogin();
            die;
        }
	}
	
}