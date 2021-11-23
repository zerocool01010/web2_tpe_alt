<?php
    class generalModel{

        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        }

        public function getAllUsers() {
            $sentence = $this->db->prepare('SELECT * FROM usuarios');
            $sentence->execute();

            $users = $sentence->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }

        public function getUserById($id) {
            $sentence = $this->db->prepare('SELECT * FROM usuarios WHERE id_user=?');
            $sentence->execute([$id]);
            $user = $sentence->fetch(PDO::FETCH_OBJ);

            return $user;
        }

        public function updateStatus($id, $status) {
            $sentence = $this->db->prepare('UPDATE usuarios SET administrador=? WHERE id_user=?');
            $sentence->execute([$status, $id]);
        }

        public function getUserByEmail($email) {
            $sentence = $this->db->prepare('SELECT * FROM usuarios WHERE email=?');
            $sentence->execute([$email]);
            $user = $sentence->fetch(PDO::FETCH_OBJ);
            return $user;
        }

        public function addUser($email, $pass) { //inserta un nuevo usuario en la tabla
            $sentence = $this->db->prepare('INSERT INTO usuarios(email, pass, administrador) VALUES(?, ?, ?)');
            $sentence->execute([$email, $pass, 0]);
        }

        public function deleteUser($id) { //elimina usuario por id
            $sentence = $this->db->prepare('DELETE FROM usuarios WHERE id_user=?');
            $sentence->execute([$id]);
        }
    }