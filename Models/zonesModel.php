<?php
    class zonesModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        }

        public function getZones() {
            $sentence = $this->db->prepare('SELECT * FROM zonas ORDER BY zona');
            $sentence->execute();

            $zones = $sentence->fetchAll(PDO::FETCH_OBJ);
            return $zones;
        }

        public function getOneZone($id) {
            $sentence = $this->db->prepare('SELECT * FROM zonas WHERE id_zona = ?');
            $sentence->execute([$id]);

            $zone = $sentence->fetch(PDO::FETCH_OBJ);
            return $zone;
        }

        public function addZone($zone, $prefecture, $city) {
            $sentence = $this->db->prepare('INSERT INTO zonas(zona, prefectura, ciudad_cercana) VALUES(?, ?, ?)');
            $sentence->execute([$zone, $prefecture, $city]);
        }

        public function deleteZone($id_zone) {
            $sentence = $this->db->prepare('DELETE FROM zonas WHERE id_zona=?');
            $sentence->execute([$id_zone]);
        }
        
        public function updateZone($zone, $prefecture, $city, $id) {
            $sentence = $this->db->prepare('UPDATE zonas SET zona=?, prefectura=?, ciudad_cercana=? WHERE id_zona=?');
            $sentence->execute([$zone, $prefecture, $city, $id]);
        }

        public function getResourcesPerZone($id) {
            $sentence = $this->db->prepare('SELECT a.recurso, a.id_recurso, b.zona FROM recursos AS a LEFT JOIN zonas AS b ON a.id_zona = b.id_zona WHERE b.id_zona=?');
            $sentence->execute([$id]);
            $resources = $sentence->fetchAll(PDO::FETCH_OBJ);
            return $resources;
        }
    }