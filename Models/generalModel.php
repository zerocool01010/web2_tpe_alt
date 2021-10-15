<?php
    class generalModel{

        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        }

        public function getUser($email) {
            $sentence = $this->db->prepare('SELECT * FROM usuarios WHERE email=?');
            $sentence->execute([$email]);
            $user = $sentence->fetch(PDO::FETCH_OBJ);
            return $user;
        }
    }