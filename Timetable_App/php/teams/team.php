<?php
require_once ("../utils.php");

session_start();

#GET
if (isset($_GET['name']) ) {

    $uid = verificaUserAuth();
    $teamName = $_GET['name'];

    $con = conexiuneCalendar();
    $tid = verificaEchipa($con, $teamName);
    verificaUserInEchipa($con, $tid, $uid);

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

#PUT
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    copyPutData();

    if (isset($_REQUEST['name']) && isset($_REQUEST['newname'])) {
        $uid = verificaUserAuth();
        $teamName = $_REQUEST['name'];
        $newName = $_REQUEST['newname'];

        $con = conexiuneCalendar();
        $tid = verificaEchipa($con, $teamName);
        verificaUserInEchipa($con, $tid, $uid);

        $query = "UPDATE teams SET name = '" . $newName . "' WHERE teams.id = " . $tid;
        $result = $con->query($query);

        if ($result === true) {
            print_r('ok');
        }
        else {
            print_r('fail');
        }
    }
}

#DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    copyDeleteData();
    if (isset($_REQUEST['name'])) {
        $uid = verificaUserAuth();
        $teamName = $_REQUEST['name'];

        $con = conexiuneCalendar();
        $tid = verificaEchipa($con, $teamName);
        verificaUserInEchipa($con, $tid, $uid);

        # sterge asocieri din users_teams
        $query = "DELETE FROM users_teams WHERE users_teams.teamId = " . $tid;
        $result = $con->query($query);

        if ($result === false) {
            die("Eroare la stergere asocieri");
        }

        # sterge echipa
        $query = "DELETE FROM teams WHERE teams.id = " . $tid;
        $result = $con->query($query);

        if ($result === false) {
            die("Eroare la stergere echipa");
        }

        print_r("ok");
    }

}

?>