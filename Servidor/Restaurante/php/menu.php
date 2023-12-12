<?php
    class Menu{
        public $name;
        public $first;
        public $dessert;

        public function __construct($name, $first, $dessert) {
            $this->name = $name;
            $this->first = $first;
            $this->dessert = $dessert;
        }
    }
?>