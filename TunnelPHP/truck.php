<?php 
    require_once('vehicle.php');
    class Truck extends Vehicle {
        private $carType;

        public function getCarType() {
            return $this->carType;
        }

        public function __construct($brand, $model, $maxSpeed) {
            parent::__construct($brand, $model, 1200, $maxSpeed);
            $this->noWheels = 8;
            $this->carType = "truck";
        }
    }
?>