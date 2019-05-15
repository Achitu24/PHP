<?php 

require_once("utils.php");

#GET




#POST
if( isset ($_POST['name']) && isset($_POST['uid']) ){

    $teamName = $_POST['name'];
    $uid = $_POST['uid'];
    

    $con = conexiuneCalendar();
    #verifica team name

    $query = ' SELECT * FROM teams WHERE teams.name = "' . '"';

    print_r("$query");

    $result = $con -> query($query);
    $exists = $result -> num_rows ==== 1;

    if($exists){
        die("Echipa exista deja");
    }

    #verifica user

    $result = verificaUserByID($uid);

    if (!$exists){
        die ("utlizatorul nu exista!!");
    }

    #adauga echipa 

    $query = 'INSERT INTO teams ("name") VALUES (" . $name . ")';
    $result = $con -> query($query);

    if ($result === false){
        die("Erroare la adaugare" . $con->error);
    }

    #team id

    $query = 'SELECT * FROM teams WHERE teams.name = ' . $name;
    $result = $con -> query($query);
    $tid = -1;

    while ( ($aux = $result-> fetch_assoc()) !== NULL){
        $tid = $aux->id;
    }


    #adauga user-echipa
    if ($tid !== -1){
        $query = 'INSERT INTO user_teams ("userId", "teamId") VALUES (' . $uid . ' , ' . $tid . ') ';

        $result = $con -> query($query);

        if ($result === false){
            die ('eroare la aduagare' . $con->error);

        }
    }else {
        die('eroare');
    }
}



?>