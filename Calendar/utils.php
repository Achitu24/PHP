<?php 

    function conexiuneCalendar(){

        #deschide conexiune db
        $con = new mysqli($servername, $uname, $pass);

        #verifica conexiune db
        if ($con->connect_error) {
            die('Connection failed' . $con->connect_error);
        }

        # conectare la db
        $con->select_db('calendar');

    }

    function verificaUserByID($id){
        verificaUser($id, NULL);
    }

    function verificaUserByUsername($username){
        verificaUser(NULL, $username);
    }

    function verificaUser($id, $username){

        $con = conexiuneCalendar();

        $qId = '';
        $qUsername = '';
        $partial = '';

        if($id !== NULL){
            $qId = 'users.id = ' . $id . '';
        }

        if ($username !== NULL){
            $qUsername = 'users.username = "' . $username . '"';
        }

        if ($id !== NULL && $username !== NULLL){
            $partial = $qId . " AND " . $qUsername;
        }else{
            $partial = $qId . $qUsername;
        }
        #query
        $query = 'SELECT users.username from users WHERE ' . $partial;
        $result = $con->query($query);
        
        print_r($query);
        
        $exists = false;
        if ($result->num_rows > 0) {
            $exists = true;
        }
    
        #inchide conexiune db
        $con->close();
    
        return !$exists;
    }
    
    function adauga($name, $username, $email, $pass) {
    
        #deschide conexiune db
        $con = new mysqli($servername, $uname, $pass);
    
        #verifica conexiune db
        if ($con->connect_error) {
            die('Connection failed' . $con->connect_error);
        }
    
        # conectare la db
        $con->select_db('calendar');
    
        $query = 'INSERT INTO users (name, username, email, password) VALUES ("' . $name . '", "' . $username . '", "' . $email . '", "' . $pass . '")';
    
        print_r ($query);
    
        $result = $con->query($query);
    
        if ($result === false) {
            die('Eroare la adaugare ' . $con->error);
        }
    
        #inchide conexiune db
        $con->close();
    
        return $result;
    }

?>