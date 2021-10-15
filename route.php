<?php
require_once 'Controllers/generalController.php';
require_once 'Controllers/resourcesController.php';
require_once 'Controllers/zonesController.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $generalController = new generalController();
    $resourcesController = new resourcesController();
    $zonesController = new zonesController();

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }

    $parameters = explode('/', $action);

    switch($parameters[0]){
        case 'home':
            $generalController->goToRenderHome();
            break;
        case 'login':
            $generalController->goToLogin();
            break;
        case 'logout':
            $generalController->logOut();
            break;
        case 'verifyLogin':
            $generalController->verifyLogin();
            break;
        case 'details':
            $resourcesController->goToDetails($parameters[1]);
            break;                                   
        case 'request':                                                                                          
            $generalController->checkIfLogged();
            if ($parameters[1] == "resources") {
                $resourcesController->goToTableResources();
            } else if ($parameters[1] == "zones") {
                $zonesController->goToTableZones();
            }
            break;
        case 'add':
            $generalController->checkIfLogged();
            if ($parameters[1] == "resource") {
                $resourcesController->goToAddResource();
                $resourcesController->goToTableResources();
            } else if ($parameters[1] == "zone") {
                $zonesController->goToAddZone();
                $zonesController->goToTableZones();
            }
            break;
        case 'delete':
            $generalController->checkIfLogged();
            if ($parameters[1] == "resource") {
                $resourcesController->goToDeleteResource($parameters[2]);
                $resourcesController->goToTableResources();
            } else if ($parameters[1] == "zone") {
                $zonesController->goToDeleteZone($parameters[2]);
                $zonesController->goToTableZones();
            }
            break;
        case 'warning':
            $generalController->checkIfLogged();
            $zonesController->goToWarning($parameters[1], $parameters[2]);
            break;
        case 'getUpdate':
            $generalController->checkIfLogged();
            if ($parameters[1] == "resource") {
                $resourcesController->goToUpdatedResourcesForm($parameters[2], $parameters[3]);
            } else if ($parameters[1] == "zone") {
                if (isset($parameters[5])) {
                    $zonesController->goToUpdatedZonesForm($parameters[2], $parameters[3], $parameters[4], $parameters[5]);
                } else {
                    $zonesController->goToUpdatedZonesForm($parameters[2], $parameters[3], $parameters[4]);
                }
            }
            break;
        case 'updateResource':                    
            $generalController->checkIfLogged();
            $resourcesController->goToUpdateResource();
            $resourcesController->goToTableResources();
            break;
        case 'updateZone':
            $generalController->checkIfLogged();         
            $zonesController->goToUpdateZone();
            $zonesController->goToTableZones();
            break;
        case 'requestZones':                       
            $zonesController->goToZones();
            break;
        case 'resourcesPerZone':
            $zonesController->goToResourcesPerZone($parameters[1], $parameters[2]); 
            break;
        default:
            $generalController->goToError();
            break;
    }