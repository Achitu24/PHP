<?php 
    require_once('vehicle.php');
    class Motorcycle extends Vehicle {
        private $carType;

        public function getCarType() {
            return $this->carType;
        }

        public function __construct($brand, $model, $maxSpeed) {
            parent::__construct($brand, $model, 100, $maxSpeed);
            $this->noWheels = 2;
            $this->carType = "motorcycle";
        }
    }
?>