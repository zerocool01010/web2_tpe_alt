<?php
    class resourcesModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        }

        public function getResources(){ 
            $sentence = $this->db->prepare('SELECT a.*, b.zona FROM recursos AS a JOIN zonas AS b ON a.id_zona = b.id_zona ORDER BY a.recurso'); //llamo la tabla entera sin distincion de nada
            $sentence->execute();

            $resources = $sentence->fetchAll(PDO::FETCH_OBJ);
            return $resources;
        }

        public function getOneResource($id){ 
            $sentence = $this->db->prepare('SELECT a.recurso, a.germinacion, a.imagen, b.zona FROM recursos AS a JOIN zonas AS b ON a.id_zona = b.id_zona WHERE a.id_recurso=?'); //llamo a un unico recurso que cumpla con la estacion y zona que llegan por parametro
            $sentence->execute(array($id));

            $resource = $sentence->fetch(PDO::FETCH_OBJ);
            return $resource;
        }
        
        public function getAllReviews(){
            $sentence = $this->db->prepare('SELECT * FROM reseñas WHERE 1');
            $sentence->execute();

            $reviews = $sentence->fetchAll(PDO::FETCH_OBJ);
            return $reviews;
        }

        private function uploadImage($image) {
            $filePath = 'images/' . uniqid() . "." . strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            move_uploaded_file($image, $filePath);
            
            return $filePath;
        }

        public function addResource($resource, $season, $id_zone, $image = null) {
            $filePath = null;
            if ($image) {
                $filePath = $this->uploadImage($image);
            }

            $sentence = $this->db->prepare('INSERT INTO recursos(recurso, germinacion, id_zona, imagen) VALUES(?, ?, ?, ?)');
            $sentence->execute([$resource, $season, $id_zone, $filePath]);
        }
        
        public function addReview($review){
            $sentence = $this->db->prepare('INSERT INTO reseñas(reseña) VALUES(?)');
            $sentence->execute([$review]);
            return $this->db->lastInsertId();
        }

        public function deleteResource($id) {
            $sentence = $this->db->prepare('DELETE FROM recursos WHERE id_recurso=?');
            $sentence->execute([$id]);
        }

        public function deleteImage($id) {
            $sentence = $this->db->prepare('UPDATE recursos SET imagen=NULL WHERE id_recurso=?');
            $sentence->execute([$id]);
        }

        public function updateResource($resource, $season, $zone, $id) {
            $sentence = $this->db->prepare('UPDATE recursos SET recurso=?, germinacion=?, id_zona=? WHERE id_recurso=?');
            $sentence->execute([$resource, $season, $zone, $id]);
        }
    }
