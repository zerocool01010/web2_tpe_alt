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

        public function renderNav($user = "") {
            if ($user == true) {
                $this->smarty->assign('user', $user);
            }
        }

        public function renderErrorPage() {
            $this->smarty->display('templates/errorPage.tpl');
        }
    }