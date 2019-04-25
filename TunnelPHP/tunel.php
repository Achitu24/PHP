<?php 
    require_once('tunelBase.php');
    
    class Tunel implements TunelBase {
        private $length;
        private $vehicles;
        private $taxVehicle;
        private $taxPerKm;
        private $taxPerVehicle;

        public function __construct($length, $taxPerKm, $taxVehicle) {
            $this->length = $length;
            $this->vehicles = array();
            $this->taxPerKm = $taxPerKm;
            $this->taxPerVehicle = $taxVehicle;
        }

        public function enterVehicle($vehicle) {
            array_push($this->vehicles, $vehicle);
        }      
        
        public function exitVehicle() {
            $this->taxVehicle = array_shift($this->vehicles);
            return $this->taxVehicle;
        }

        public function calculate() {
            $currentVehicle = $this->taxVehicle;
            echo "Tax calculated for: " . $currentVehicle->getCarType() . " " . $currentVehicle->getModel();
            echo "<br>";
            $tax = 0;
            $tax += $this->length * $this->taxPerKm;
            echo "Base tax is tunnel length * tax per km: " . $this->length . " * " . $this->taxPerKm;
            echo "<br>";
            if ($currentVehicle->getCarType() == "motorcycle") {
                $tax += 1 * $this->taxPerVehicle;
                echo "Add to tax 1 * " . $this->taxPerVehicle;
            } elseif ($currentVehicle->getCarType() == "car") {
                $tax += 2 * $this->taxPerVehicle;
                echo "Add to tax 2 * " . $this->taxPerVehicle;
            } elseif ($currentVehicle->getCarType() == "truck") {
                $tax += 4 * $this->taxPerVehicle;
                echo "Add to tax 4 * " . $this->taxPerVehicle;
            } else {
                $tax += 10 * $this->taxPerVehicle;
                echo "Add to tax 10 * " . $this->taxPerVehicle;
            }
            echo "<br>";
            return $tax;
        }

        public function getLength() {
            return $this->length;
        }
    }

?>