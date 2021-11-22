<?php
require_once './Models/zonesModel.php';
require_once './Views/zonesView.php';
require_once './Views/generalView.php';
require_once './Helpers/AuthHelper.php';

class zonesController{

    private $model;
    private $view;
    private $viewU;
    private $authHelper;

    function __construct() {
        $this->model = new zonesModel();
        $this->view = new zonesView();
        $this->viewU = new generalView();
        $this->authHelper = new AuthHelper();
    }

    public function goToZones() {
        $zones = $this->model->getZones();
        $this->view->renderZones($zones);
    }

    public function goToResourcesPerZone($id, $zone) {
        $resources = $this->model->getResourcesPerZone($id);
        $this->view->renderResourcesPerZone($resources, $zone);
    }

    public function goToTableZones() {
        if ($this->authHelper->checkIfLogged() XOR $this->authHelper->checkIfAdminLogged()) {
            $zones = $this->model->getZones();
            $admin = isset($_SESSION['admin']);
            $this->view->renderZonesForm($admin, $zones);
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToAddZone(){
        if ($this->authHelper->checkIfAdminLogged()) {
            $this->model->addZone($_POST['zone'], $_POST['prefecture'], $_POST['city']);
            $this->goToTableZones();
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToDeleteZone($id_zone) {
        $this->model->deleteZone($id_zone);
    }

    public function goToUpdatedZonesForm($zone, $prefecture, $id, $city = "") {
        $zones = $this->model->getZones();
        $this->view->renderZonesForm($zones, $zone, $prefecture, $id, $city);
    }

    public function goToUpdateZone() {
        $this->model->updateZone($_POST['zone'], $_POST['prefecture'], $_POST['city'], $_POST['id']);
    }

    public function goToWarning($id_zone, $zone) {
        $this->view->renderWarning($id_zone, $zone);
    }
}