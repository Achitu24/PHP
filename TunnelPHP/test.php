<?php 
    require_once('tunel.php');
    require_once('car.php');
    require_once('motorcycle.php');
    require_once('truck.php');

    $polo = new Car("VW", "Polo", 250);
    $moto = new Motorcycle("BMW", "i3", 130);
    $truck = new Truck("MAN", "MAN", 130);

    $tunel = new Tunel(12, 1.5, 1.2);

    $tunel->enterVehicle($polo);
    $tunel->enterVehicle($moto);
    $tunel->enterVehicle($truck);

    $tunel->exitVehicle();
    echo $tunel->calculate();

    echo "<br>";
    echo "<br>";

    $tunel->exitVehicle();
    echo $tunel->calculate();

    echo "<br>";
    echo "<br>";

    $tunel->exitVehicle();
    echo $tunel->calculate();

    echo "<br>";
?>