<?php 
    require_once('vehicle.php');
    class Car extends Vehicle {
        private $carType;

        public function getCarType() {
            return $this->carType;
        }

        public function __construct($brand, $model, $maxSpeed) {
            parent::__construct($brand, $model, 200, $maxSpeed);
            $this->noWheels = 4;
            $this->carType = "car";
        }
    }
?>