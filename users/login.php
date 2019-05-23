<?php

require_once("../utils.php");

session_start();
print_r(session_id());

function verificaUsernamePassword($username, $password){
    $con = conexiuneCalendar();

    //query
    $query = 'SELECT users.id from users WHERE users.username = "' . $username .'" AND users.password = "' . $password . '"';
    
    $result = $con->query($query);
    print_r($query);
    
	$uid = -1;
	if($result->num_rows === 1) {
		while ($aux = $result->fetch_assoc()) {
			$uid = $aux['id'];
		}
    }

    #inchide conexiune db
    $con->close();

    return $uid;
}

if(isset($_POST['username']) && isset($_POST['password']) ){
    $uid = verificaUsernamePassword($_POST['username'], $_POST['password']);

    if($uid === -1){
        print_r("Credentiale invalide");
    } else {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['userid'] = $uid;
		setcookie('test', $_POST['password'], time() + 36000, '/', '');
		
		
		
        print_r("Logare cu succes!");
    }

}

?>