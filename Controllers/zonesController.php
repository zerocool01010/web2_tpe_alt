<?php
require_once './Models/zonesModel.php';
require_once './Views/zonesView.php';

class zonesController{

    private $model;
    private $view;

    function __construct() {
        $this->model = new zonesModel();
        $this->view = new zonesView();
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
        $zones = $this->model->getZones();
        $this->view->renderZonesForm($zones);
    }

    public function goToAddZone(){
        $this->model->addZone($_POST['zone'], $_POST['prefecture'], $_POST['city']);
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