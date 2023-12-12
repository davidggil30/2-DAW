<?php
    class User{
        public $username;
        public $password;
        public $rol;
        public $available;

        public function __construct($username, $password, $rol) {
            $this->username = $username;
            $this->password = $password;
            if($rol == 1){
                $this->rol = "admin";
            }
            else if($rol == 2){
                $this->rol = "personal";
                $this->available = true;
            }
            else if($rol == 3){
                $this->rol = "client";
            }     
        }
    }
?>