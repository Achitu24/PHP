
<!DOCTYPE html>
<html>



<body>

    <?php
        class Vehicle{
            private $brand;
            private $model;
            private $maxSpeed;
            private $currentSpeed;
            private $engineON;
            private $noWheels;


            public function __construct($b, $m ,$mS){
                $this -> brand = $b;
                $this -> model = $m;
                $this -> maxSpeed = $mS;
                $this -> currentSpeed = 0;
                $this -> engineON = true;
            }

            public function getBrand(){
                return $this -> brand;
            }

            public function setBrand($brand){
                return $this -> brand = $brand;
            }

            public function getModel(){
                $this -> model;
            }

            public function setModel($model){
                $this -> model = $model;
            }

            public function getMaxSpeed(){
                return $this -> maxSpeed;
            }

            public function setMaxSpeed($maxSpeed){
                return $this -> maxSpeed = $maxSpeed;
            }

            public function getCurrentSpeed(){
                return $this -> currentSpeed;
            }

            public function setCurrentSpeed($currentSpeed){
                return $this -> currentSpeed = $currentSpeed;
            }

            public function getEngineON(){
                return $this -> engineON;
            }

            public function setEngineON($engineON){
                return $this -> engineON = $engineON;
            }

            public function getNoWheels(){
                return $this -> noWheels;
            }

            public function setNoWheels(){
                return $this -> noWheels = $noWheels;
            }


            public function startEngine(){
                $aux = $this -> getEnergyFromBattery();
                if($aux == true){
                    $aux = $this -> multiplyEnergy();
                    if ($aux == true){
                        $this -> engineON = true;
                    } else {
                        $this -> engineON = false;
                        return false;
                    }
                } else {
                    $this -> engineON = false;
                    return false;
                }
                $this -> currentSpeed = 0;

                return true;
            }

            private function getEnergyFromBattery(){
                return true;
            }

            private function multiplyEnergy(){
                return true;
            }

            public function stopEngine(){
                $this -> currentSpeed = 0;
            }
            public function accelerate(){
                if ($this -> engineON == true){
                    $this -> currentSpeed += 5;
                } else {
                    echo "Error";
                }
            }

            public function pressBreak(){
                $this -> currentSpeed -= 5;
            }
        }
        
        
        
        
        class Car{
            private $brand;
            private $model;
            private $maxSpeed;
            private $currentSpeed;
            private $engineON;
            private $noWheels;

            public function startEngine(){
                $aux = $this -> getEnergyFromBattery();
                if($aux == true){
                    $aux = $this -> multiplyEnergy();
                    if ($aux == true){
                        $this -> engineON = true;
                    } else {
                        $this -> engineON = false;
                        return false;
                    }
                } else {
                    $this -> engineON = false;
                    return false;
                }
                $this -> currentSpeed = 0;

                return true;
            }

            private function getEnergyFromBattery(){
                return true;
            }

            private function multiplyEnergy(){
                return true;
            }

            public function stopEngine(){
                $this -> currentSpeed = 0;
            }
            public function accelerate(){
                if ($this -> engineON == true){
                    $this -> currentSpeed += 5;
                } else {
                    echo "Error";
                }
            }

            public function pressBreak(){
                $this -> currentSpeed -= 5;
            }

            public function __construct($b, $m ,$mS){
                $this -> brand = $b;
                $this -> model = $m;
                $this -> maxSpeed = $mS;
                $this -> currentSpeed = 0;
                $this -> engineON = true;
            }

            public function getBrand(){
                return $this -> brand;
            }

            public function setBrand($brand){
                return $this -> brand = $brand;
            }

            public function getModel(){
                $this -> model;
            }

            public function setModel($model){
                $this -> model = $model;
            }

            public function getMaxSpeed(){
                return $this -> maxSpeed;
            }

            public function setMaxSpeed($maxSpeed){
                return $this -> maxSpeed = $maxSpeed;
            }

            public function getCurrentSpeed(){
                return $this -> currentSpeed;
            }

            public function setCurrentSpeed($currentSpeed){
                return $this -> currentSpeed = $currentSpeed;
            }

            public function getEngineON(){
                return $this -> engineON;
            }

            public function setEngineON($engineON){
                return $this -> engineON = $engineON;
            }

            public function getNoWheels(){
                return $this -> noWheels;
            }

            public function setNoWheels(){
                return $this -> noWheels = $noWheels;
            }

        }

        $vehicle = new Car('Volvo', 'XC60', 200);

        $on = $vehicle -> startEngine();
        echo $on;

        $vehicle -> startEngine();
        echo $vehicle -> getCurrentSpeed();
        echo "<br>";

        $vehicle -> accelerate();
        echo $vehicle ->getCurrentSpeed();
        echo "<br>";

        $vehicle -> stopEngine();
        echo $vehicle ->getCurrentSpeed();



    ?>










</body>

</html>