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
        case 'register': 
            $generalController->goToRegisterUser();
            break;
        case 'registerUser':
            $generalController->registerUser();
            break;
        case 'verifyLogin':
            $generalController->verifyLogin($_POST['email'], $_POST['password']);
            break;
        case 'details':
            $resourcesController->goToDetails($parameters[1]);
            break;                                   
        case 'request':                                                                                          
            if ($parameters[1] == "resources") {
                $resourcesController->goToTableResources();
            } else if ($parameters[1] == "zones") {
                $zonesController->goToTableZones();
            } else if ($parameters[1] == "panel") {
                $generalController->goToPanel();
            } else if ($parameters[1] == "panel-reviews") {
                $generalController->goToReviewsPanel();
            }
            break;
        case 'add':
            if ($parameters[1] == "resource") {
                $resourcesController->goToAddResource();
            } else if ($parameters[1] == "zone") {
                $zonesController->goToAddZone();
            }
            break;
        case 'delete':
            if ($parameters[1] == "resource") {
                $resourcesController->goToDeleteResource($parameters[2]);
            } else if ($parameters[1] == "image") {
                $resourcesController->goToDeleteImage($parameters[2]);
            } else if ($parameters[1] == "zone") {
                $zonesController->goToDeleteZone($parameters[2]);
            } else if ($parameters[1] == "user") {
                $generalController->goToDeleteUser($parameters[2]);
            }
            break;
        case 'warning':
            if ($parameters[1] == "zone") {
                $zonesController->goToWarning($parameters[1], $parameters[2]);
            } else if ($parameters[1] == "panel") {
                $generalController->goToWarning($parameters[1], $parameters[2]);
            } else if ($parameters[1] == "review") {
                $generalController->goToWarning($parameters[1], $parameters[2]);
            }
            break;
        case 'getUpdate':
            if ($parameters[1] == "resource") {
                $resourcesController->goToUpdatedResourcesForm($parameters[2]);
            } else if ($parameters[1] == "zone") {
                $zonesController->goToUpdatedZonesForm($parameters[2]);
            } else if ($parameters[1] == "user") {
                $generalController->goToChangeStatus($parameters[2]);
            }
            break;
        case 'updateResource':                    
            $resourcesController->goToUpdateResource();
            break;
        case 'updateZone':      
            $zonesController->goToUpdateZone();
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