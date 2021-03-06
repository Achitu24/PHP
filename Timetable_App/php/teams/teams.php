<?php
require_once("../utils.php");

session_start();

#GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['userid'])) {
        $uid = $_SESSION['userid'];
        $con = conexiuneCalendar();

        $query = 'SELECT teams.name FROM users_teams INNER JOIN teams ON users_teams.teamId = teams.id WHERE users_teams.userId = ' . $uid;

        print_r($query);

        $result = $con->query($query);
        
        $teamNames = array();
        while($aux = $result->fetch_assoc()){
            array_push($teamNames, $aux['name']);
        }

        print_r($teamNames);
    }
    else {
        die('Utilizator neautentificat');
    }
}


#POST

if (isset($_POST['name']) && isset($_SESSION['userid'])) {

    $teamName = $_POST['name'];
    $uid = $_SESSION['userid'];
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