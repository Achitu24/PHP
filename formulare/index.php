<!DOCTYPE html>
<html>

<style>
*{
    display : flex;
    flex-direction:column;
}

</style>

<body>
    <h1>My first PHP page</h1>


    <?php

    $name = $email = $username = $gender = $description = $cnp = "";
    $err_email = '';
    $err = false;
    
    $error = false;
    
    $validcnp = true;
    $errcnp = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        

        if(!empty($_POST["name"])){
            $name = test_input($_POST["name"]);
        }else {
            $error = true;
        }
        if(!empty($_POST["email"])){
            $email = test_input($_POST["email"]);
            $err = validate($email);
            if($err == false){
               $err_email = 'N-ai reusit';
            }
        }
        else {
            $err_email = ' Nu e email aici';
        }
        if(!empty($_POST["username"])){
            $username = test_input($_POST["username"]);
        }
        if(!empty($_POST["gender"])){
            $gender = test_input($_POST["gender"]);
        }
        if(!empty($_POST["description"])){
            $description = test_input($_POST["description"]);
        }
        if(!empty($_POST["cnp"])){
            $cnp = test_input($_POST["cnp"]);
            $validcnp = cnp_validate($cnp);
            if ($validcnp == fasle){
                $errcnp = "CNP invalid";
            }

        }
    }

    function validate($a){
        $valid = explode('@', $a);
        if (count ($valid) == 2){
            $aux = $valid[1];
            $domain = explode('.', $aux);
            if ( count($domain) >= 2){
                return true;
            }
        }
        return false;
    }

    function cnp_validate($b){
        if (strlen($b) != 13){
            return false;
        }

        $gen = substr($b,0,1);
        if ($gender == 'female'){
            if ($gen % 2 != 0){
                return false;
            }
        }else if ($gender == 'masculin'){
            if ($gen % 2 != 1){
                return false;
        } 
        $ancnp = substr($cnp, 1, 2);
        if ($gen < 3){
            
            $an = 1900 + $ancnp;
        } else {
            $an = 2000 +$ancnp;
        }
        $lunacnp = substr($cnp, 3, 2);
        $zicnp = substr($cnp , 5, 2);

        $date = date_create($ancnp.'-'.$lunacnp,'-'.$zicnp);

        $currentDate = getdate();
        
    }



    function test_input($data){
        $data= trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }


    ?>

    <form action=" <?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>" method="POST">
        Name:
        <input type="text" name="name"><br>
        <?php if($error){
            echo "all field req";
        }?>
        Username
        <input type="text" name="username">
        E-mail:
        <input type="text" name="email"><br>
        <?php echo $err_email; ?>
        CNP
        <input type="text" name="cnp">


        <input type="radio" name="gender" value="female" checked>Female
        <input type="radio" name="gender" value="female">Male
        <input type="radio" name="gender" value="female">Other

        Descriere:
        <textarea name="description" rows="5" cols="40" rows="10"></textarea>
        <input type="submit" name="submit" value="submit">

    </form>


</body>

</html>