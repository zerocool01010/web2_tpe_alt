<?php
require_once "./Models/resourcesModel.php";
require_once "./Views/ApiView.php";

class ApiResourcesController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new resourcesModel();
        $this->view = new ApiView();
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

    function eliminarTarea($params = null) { 
        $idTarea = $params[":ID"];
        $tarea = $this->model->getTask($idTarea);

        if ($tarea) {
            $this->model->deleteTaskFromDB($idTarea);
            return $this->view->response("La tarea con el id=$idTarea fue borrada", 200);
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404);
        }
    } */

    function insertReview() { 
        $body = $this->getBody(); 
        print_r($body->reseña);
        $id = $this->model->addReview($body->reseña); 
        if ($id != 0) {
            $this->view->response("La reseña se insertó con el id=$id", 200);
        } else {
            $this->view->response("La reseña no se pudo insertar", 500);
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