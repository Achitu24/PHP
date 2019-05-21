<?php

require_once("credentiale.inc");

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