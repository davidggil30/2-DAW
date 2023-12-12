<?php
    class User{
        public $username;
        public $password;
        public $rol;

        public function __construct($username, $password, $rol) {
            $this->username = $username;
            $this->password = $password;
            if($rol == 1)
                $this->rol = "admin";
            else if($rol == 2)
                $this->rol = "client";
        }
    }
?>