<?php

require_once 'libs/Router.php';
require_once 'Controllers/ApiResourcesController.php';

$router = new Router();

$router->addRoute('recurso', 'GET', 'ApiResourcesController', 'getReviews');
$router->addRoute('recurso/:ID', 'GET', 'ApiResourcesController', 'getReview');
$router->addRoute('recurso/:ID', 'DELETE', 'ApiResourcesController', 'deleteReview');
$router->addRoute('recurso', 'POST', 'ApiResourcesController', 'insertReviewValue');
$router->addRoute('recurso/:ID', 'PUT', 'ApiResourcesController', 'updateReview');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);