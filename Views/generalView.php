<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

    class generalView{

        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
            $this->smarty->assign('BASE_URL', BASE_URL);
        }

        public function renderLogin(){
            $this->smarty->display('templates/login.tpl');
        }

        public function renderHome($resources) {
            $this->smarty->assign('resources', $resources);
            $this->smarty->display('templates/home.tpl');
        }

        public function renderNav($userOrAdmin = "") {
            if ($userOrAdmin == true) {
				if (array_key_exists('user', $_SESSION)){
					$this->smarty->assign('user', $userOrAdmin);
				}
				if (array_key_exists('admin', $_SESSION)){
					$this->smarty->assign('admin', $userOrAdmin);
				}
            }
        }

        public function renderErrorPage() {
            $this->smarty->display('templates/errorPage.tpl');
        }

        public function renderRegisterForm($warning = "") {
            $this->smarty->assign('warning', $warning);
            $this->smarty->display('templates/registerForm.tpl');
        }
    }