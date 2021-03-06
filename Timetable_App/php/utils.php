<?php

require_once("credentiale.inc");
session_start();

function verificaUserAuth() {
    if (!isset($_SESSION['userid'])) {
        die('Utilizatorul nu este autentificat');
    }

    return $_SESSION['userid'];
}

function verificaEchipa($con, $teamName) {
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

    return $tid;
}

function verificaUserInEchipa($con, $tid, $uid) {
    $query = "SELECT userId FROM users_teams WHERE users_teams.teamId = " . $tid . " AND users_teams.userId = " .  $uid;
    $result = $con->query($query);
    
    if ($result->num_rows !== 1) {
        die("Utilizatorul nu are dreptul sa vada membrii echipei.");
    }
}

function copyPutData() {
    parse_str(file_get_contents("php://input"), $_PUT);
	foreach ($_PUT as $key => $value) {
		unset($_PUT[$key]);
		$_PUT[str_replace('amp;', '', $key)] = $value;
    }
    $_REQUEST = array_merge($_REQUEST, $_PUT);
}

function copyDeleteData() {
    parse_str(file_get_contents("php://input"), $_DELETE);
	foreach ($_DELETE as $key => $value) {
		unset($_DELETE[$key]);
		$_DELETE[str_replace('amp;', '', $key)] = $value;
	}
	$_REQUEST = array_merge($_REQUEST, $_DELETE);
}

function conexiuneCalendar(){
    #credentiale
   
   #deschide conexiune db
   $con = new mysqli(ADDRESS, USERNAME, PASSWORD);

   #verifica conexiune db
   if ($con->connect_error) {
       die('Connection failed' . $con->connect_error);
   }

   # conectare la db
   $con->select_db(DATABASE);

   return $con;
}

function verificaUserById($id){
    verificaUser($id, NULL);
}
function verificaUserByUsername($username){
    verificaUser(NULL, $username);

}
function verificaUser($id, $username){
    $con = conexiuneCalendar();
    $qId = "";
    $qUsername = "";
    $partial = "";
	
    if($id !== NULL){
        $qId = 'users.id = ' . $id . '';
    }
    if($username !== NULL){
        $qUsername = 'users.username = "' . $username . '" ';
    }
    if($id !== NULL && $username !== NULL){
        $partial = $qId . "AND" . $qUsername;
    }else {
        $partial = $qId . $qUsername;
    }

    #query
    $query = 'SELECT users.username FROM users WHERE ' . $partial;
    $result = $con->query($query);
	
	print_r($query);
	
    $exists = false;
	
    if ($result->num_rows === 1) {
        $exists = true;
    }
	
	$username = FALSE;
    while($aux = $result->fetch_assoc()){
        $username = $aux['username'];
    }
	
	print_r($username);

    #inchide conexiune db
    $con->close();
	

    return $username;
}

?>