<?php 

    require_once("credentials.php");
    require_once("utils.php");

    function verificaUsernamePassword( $username, $password){
        $con = conexiuneCalendar();

        #query
        $query = 'SELECT users.username from users WHERE users.username = "' . $username . '" AND users.password = "' . $password . '"';
        $result = $con->query($query);

        print_r($query);

        $exists = false;
        if ($result->num_rows === 1) {
            $exists = true;
        }

        #inchide conexiune db
        $con->close();

        return $exists;
	
    }

    if ( isset ($_POST['username']) && isset ($_POST['password']) ){

        print_r($_POST['password']);
        $result = verificaUsernamePassword( $_POST['username'], $_POST['password']);

        if ($result === false){
            print_r("Credentiale invalide");
        }else {
            print_r("Logat cu succes");
        }
    }

?>