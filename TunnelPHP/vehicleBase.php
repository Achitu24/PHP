<?php 

interface VehicleBase {
    public function startEngine();
    public function stopEngine();
    public function getCarType();
    public function accelerate();
    public function pressBreak();
}

?>