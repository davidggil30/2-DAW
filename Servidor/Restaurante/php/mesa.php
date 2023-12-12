<?php

    class Mesa{
        public $id;
        public $menu;

        public function __construct($id, $menu) {
            $this->id = $id;
            $this->menu = $menu;
        }
    }
?>