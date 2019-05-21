<?php
require_once("../utils.php");

#GET

#POST
if(isset($_POST['name']) && isset($_POST['uid'])){

    $teamName = $_POST['name'];
    $uid = $_POST['uid'];
    $con = conexiuneCalendar();
    //Verifica team name
	
    $query = 'SELECT * FROM teams WHERE teams.name = "' .$teamName . '"';
    print_r($query);

    $result = $con->query($query);
    $exists = $result->num_rows === 1;

    if($exists === TRUE){
        die("Echipa exista deja");
    }

    //Verifica user
    $name = verificaUserById($uid);
    if($name === FALSE){
        die("Utilizatorul nu exista");
    }

    //adauga echipa
    $query = 'INSERT INTO teams (name) VALUES("'. $teamName .'")' ;
	print_r($query);
    $result = $con->query($query);

    if($result === false){
        die('Eroare la adaugare' . $con->error);
    }
    //team id
    $query = 'SELECT * FROM teams WHERE teams.name = "' . $teamName . '"';
	print_r($query);
	
    $result = $con->query($query);
    $tid = -1;
    while($aux = $result->fetch_assoc()){
        $tid = $aux['id'];
    }

    //adauga user-echipa
    if($tid !== -1){
        $query = 'INSERT INTO users_teams(userId, teamId) VALUES (' . $uid .',' . $tid .' )';
		print_r($query);
        $result = $con->query($query);

        if($result === false){
            die('Eroare la adaugare' . $con->error);
        }
    }else{
        die('Eroare');
    }

    //inchidere BAZA de date
    $con->close();
}


?>