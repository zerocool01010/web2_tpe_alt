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
        if ($this->authHelper->checkIfAdminLogged()) {
            $this->model->deleteZone($id_zone);
            $this->goToTableZones();
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToUpdatedZonesForm($id) {
        if ($this->authHelper->checkIfAdminLogged()) {
            $zone = $this->model->getOneZone($id);
            $zones = $this->model->getZones();
            $admin = isset($_SESSION['admin']);
            $this->view->renderZonesForm($admin, $zones, $zone);
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToUpdateZone() {
        if ($this->authHelper->checkIfAdminLogged()) {
            $this->model->updateZone($_POST['zone'], $_POST['prefecture'], $_POST['city'], $_POST['id']);
            $this->goToTableZones();
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToWarning($id_zone, $zone) {
        $this->view->renderWarning($id_zone, $zone);
    }
}