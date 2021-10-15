<?php
require_once './Models/resourcesModel.php';
require_once './Views/resourcesView.php';
require_once './Models/zonesModel.php';

class resourcesController{

    private $modelR;
    private $modelZ;
    private $view;

    function __construct() {
        $this->modelR = new resourcesModel();
        $this->modelZ = new zonesModel();
        $this->view = new resourcesView();
    }

    public function goToDetails($id) { // este debería dejarlo en recursos
        $resource = $this->modelR->getOneResource($id);
        $this->view->renderDetails($resource);
    }

    public function goToTableResources() {
        $resources = $this->modelR->getResources();
        $zones = $this->modelZ->getZones();
        $this->view->renderResourcesForm($resources, $zones);
    }

    public function goToAddResource(){
        if ($_POST['season'] == "Error" || $_POST['zone'] == "Error") {
            $this->view->renderErrorPage();
            die;
        } else {
        $this->modelR->addResource($_POST['resource'], $_POST['season'], $_POST['zone']);
        }
    }

    public function goToDeleteResource($id) {
        $this->modelR->deleteResource($id);
    }

    public function goToUpdatedResourcesForm($id, $resource) {
        $resources = $this->modelR->getResources();
        $zones = $this->modelZ->getZones();
        $this->view->renderResourcesForm($resources, $zones, $id, $resource);
    }

    public function goToUpdateResource(){
        if ($_POST['season'] == "Error" || $_POST['zone'] == "Error") {
            $this->view->renderErrorPage();
            die;
        } else {
        $this->modelR->updateResource($_POST['resource'], $_POST['season'], $_POST['zone'], $_POST['id']);
        }
    }

}
