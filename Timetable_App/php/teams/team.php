<?php
require_once ("../utils.php");

#GET
if (isset($_GET['name']) ) {
    $teamName = $_GET['name'];

    $con = conexiuneCalendar();

    $query = "SELECT id FROM teams WHERE teams.name = '" . $teamName . "'";
    print_r($query);

    $result = $con->query($query);
    if($result ->num_rows !== 1){
        die("Nume invalid");
    }

    $tid = -1;
    while($aux = $result->fetch_assoc()){
        $tid = $aux['id'];
    }

    $query = "SELECT * FROM users_teams WHERE users_teams.teamId = " . $tid;
	print_r($query);
    $result = $con->query($query);
    if($result->num_rows === 0) {
        die("Nu exista utilizatori in echipa" . $teamName);
    }
    
    $userIds = array();
    while($aux = $result->fetch_assoc()){
        array_push($userIds, $aux['userId']);
    }

	$users = array();
$query = "SELECT * FROM users WHERE users.id IN (" . implode(',', $userIds) . ")";
	print_r($query);
	$result = $con->query($query);
    while($aux = $result->fetch_assoc()){
        array_push($users, array("id"=>$aux['id'], "name"=>$aux['name'], "email"=>$aux['email']));
        
    }
    print_r($users);

    $con->close();
}



?>