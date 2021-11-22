<?php
require_once './Models/resourcesModel.php';
require_once './Views/resourcesView.php';
require_once './Models/zonesModel.php';
require_once './Helpers/AuthHelper.php';
require_once './Views/generalView.php';

class resourcesController{

    private $modelR;
    private $modelZ;
    private $view;
    private $viewU;
    private $authHelper;

    function __construct() {
        $this->modelR = new resourcesModel();
        $this->modelZ = new zonesModel();
        $this->view = new resourcesView();
        $this->viewU = new generalView();
        $this->authHelper = new AuthHelper();
    }

    public function goToDetails($id) { // este debería dejarlo en recursos
        $resource = $this->modelR->getOneResource($id);
        $this->view->renderDetails($resource);
    }

    public function goToTableResources() {
        if ($this->authHelper->checkIfLogged() XOR $this->authHelper->checkIfAdminLogged()) {
            $resources = $this->modelR->getResources();
            $zones = $this->modelZ->getZones();
            $admin = isset($_SESSION['admin']);
            $this->view->renderResourcesForm($admin, $resources, $zones);
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToAddResource(){
        if ($_POST['season'] == "Error" || $_POST['zone'] == "Error") {
            $this->view->renderErrorPage();
            die;
        } else {
            if ($this->authHelper->checkIfAdminLogged()) {
                $this->modelR->addResource($_POST['resource'], $_POST['season'], $_POST['zone']);
                $this->goToTableResources();        
            } else {
                $this->viewU->renderLogin();
            }
        }
    }

    public function goToDeleteResource($id) {
        if ($this->authHelper->checkIfAdminLogged()) {
            $this->modelR->deleteResource($id);
            $this->goToTableResources();
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToUpdatedResourcesForm($id) {
        if ($this->authHelper->checkIfAdminLogged()) {
            $resources = $this->modelR->getResources();
            $resource = $this->modelR->getOneResource($id);
            $zones = $this->modelZ->getZones();
            $admin = isset($_SESSION['admin']);
            $this->view->renderResourcesForm($admin, $resources, $zones, $id, $resource);
        } else {
            $this->viewU->renderLogin();
        }
    }

    public function goToUpdateResource(){
        if ($_POST['season'] == "Error" || $_POST['zone'] == "Error") {
            $this->view->renderErrorPage();
            die;
        } else {
            if ($this->authHelper->checkIfAdminLogged()) {
                $this->modelR->updateResource($_POST['resource'], $_POST['season'], $_POST['zone'], $_POST['id']);
                $this->goToTableResources();
            } else {
                $this->viewU->renderLogin();
            }
        }
    }

}
