<?php
    class Car{
        public $brand;
        public $license;
        public $cv;
        public $price;

        public function __construct($brand, $license, $cv, $price) {
            $this->brand = $brand;
            $this->license = $license;
            $this->cv = $cv;
            $this->price = $price;
        }
    }
?>