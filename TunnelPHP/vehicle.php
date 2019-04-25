<?php
    require_once('vehicleBase.php');
    abstract class Vehicle implements VehicleBase {
        private $brand;
        private $model;
        private $weight;
        private $noWheels;
        private $maxSpeed;
        private $currentSpeed;
        private $engineOn;

        public function __construct($brand, $model, $weight, $maxSpeed) {
            $this->brand = $brand;
            $this->model = $model;
            $this->weight = $weight;
            $this->noWheels = 0;
            $this->maxSpeed = $maxSpeed;
            $this->currentSpeed = 0;
            $this->engineOn = false;
        }

        public function getBrand() {
            return $this->brand;
        }

        public function getModel() {
            return $this->model;
        }

        public function getWeight() {
            return $this->weight;
        }
        public function setWeight($weight) {
            $this->weight = $weight;
        }

        public function getNoWheels() {
            return $this->noWheels;
        }

        public function getMaxSpeed() {
            return $this->maxSpeed;
        }

        public function getCurrentSpeed() {
            return $this->currentSpeed;
        }
        public function setCurrentSpeed($speed) {
            $this->currentSpeed = $speed;
        }

        public function getEngineOn() {
            return $this->engineOn;
        }
        public function setEngineOn($on) {
            $this->engineOn = $on;
        }

        public function startEngine() {

        }
        public function stopEngine() {

        }
        abstract public function getCarType();

        public function accelerate() {

        }
        public function pressBreak() {

        }
    }
?>