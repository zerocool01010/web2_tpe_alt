<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

    class zonesView{

        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
            $this->smarty->assign('BASE_URL', BASE_URL);
        }

        public function renderZonesForm($zones, $zone = "", $prefecture = "", $id = "", $city = "") {
            $this->smarty->assign('zones', $zones);
            $this->smarty->assign('zone', $zone);
            $this->smarty->assign('prefecture', $prefecture);
            $this->smarty->assign('id', $id);
            $this->smarty->assign('city', $city);
            $this->smarty->display('templates/zonesForm.tpl');
        }

        public function renderWarning($id_zone, $zone) {
            $this->smarty->assign('id_zone', $id_zone);
            $this->smarty->assign('zone', $zone);
            $this->smarty->display('templates/warning.tpl');
        }

        public function renderZones($zones) {
            $this->smarty->assign('zones', $zones);
            $this->smarty->display('templates/zones.tpl');
        }

        public function renderResourcesPerZone($resources, $zone) { 
            $this->smarty->assign('resources', $resources);
            $this->smarty->assign('zone', $zone);
            $this->smarty->display('templates/resourcesPerZone.tpl');
        }
    }