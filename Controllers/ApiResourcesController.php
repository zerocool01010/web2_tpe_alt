<?php
require_once "./Models/resourcesModel.php";
require_once "./Views/ApiView.php";
require_once "./Helpers/AuthHelper.php";

class ApiResourcesController{

    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new resourcesModel();
        $this->view = new ApiView();
        $this->helper = new AuthHelper();
    }

     function getReviews(){
        $reviews = $this->model->getAllReviews(); 
        return $this->view->response($reviews, 200); 
    }
    /*

    function obtenerTarea($params = null) { 
        $idTarea = $params[":ID"]; 
        $tarea = $this->model->getTask($idTarea); 
        if ($tarea) { //si existe...
            return $this->view->response($tarea, 200); 
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404); 
        }
    }
    */
    function deleteReview($params = null) {
        $id_review = $params[":ID"];
        $review = $this->model->getOneReview($id_review);

        if ($review) { //verifico que exista en la db ¿es realmente necesario? Porque si la id llega es por algo
            if ($this->helper->checkIfAdminLogged()) {
                $this->model->deleteReview($id_review);
                return $this->view->response("La review con el id=$id_review fue borrada", 200);
            } else {
                return $this->view->response("No es administrador", 316);
            }
        } else {
            return $this->view->response("La review con el id=$id_review no existe", 404);
        }
    } 

    function insertReviewValue() { 
        $body = $this->getBody(); 
        /* print_r($body->reseña); */
        if ($this->helper->checkIfLogged()) {
            if ($body->reseña && $body->valoracion){
                $id = $this->model->addReview($body->reseña, $body->valoracion); 
                if ($id != 0) {
                    $this->view->response("La reseña y valoracion se insertaron con el id=$id", 200);
                } else {
                    $this->view->response("La reseña y valoracion no se pudieron insertar", 500);
                }
            } else {
                $this->view->response("No se pudo decodear el json", 311);
            }
        } else {
            $this->view->response("No es usuario logueado", 315);
        }
		
    }

   /*  function actualizarTarea($params = null) { 
        $idTarea = $params[':ID'];
        $body = $this->getBody();
      
        $tarea = $this->model->getTask($idTarea);

        if ($tarea) {
            $this->model->update($idTarea, $body->titulo, $body->descripcion, $body->prioridad, $body->finalizada);
            $this->view->response("La tarea se actualizó correctamente", 200);
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404);
        }
    }*/
   
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString); 
    } 

}