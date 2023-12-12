<?php
    class User{
        public $username;
        public $password;

        public function __construct($username, $password) {
            $this->username = ucfirst($username);
            $this->password = ucfirst($password);
        }
    }
?>