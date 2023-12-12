<?php
    class Contact{
        public $name;
        public $surname;
        public $tel;

        public function __construct($name, $surname, $tel) {
            $this->name = ucfirst($name);
            $this->surname = ucfirst($surname);
            $this->tel = $tel;
        }
    }
?>