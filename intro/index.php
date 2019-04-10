<!DOCTYPE html>
<html>
<body>
    <h1>My first PHP page</h1>
    <?php
    
    
    
    function myFunction($v1,$v2){
        if($v1 === $v2){
            return "same";
        } else{
        return "different";
        }
    }


    $a1 = array ("horse","dog","cat");
    $a2 = array ("Cow","dog","Rat");
    print_r(array_map("myFunction",$a1,$a2));
    

    //tema: array_map pe 3 array
    //array reduce -> afiseaza suma numerelor din array
    //array_intersect 
    //array_push in array 
    
    
    
    // $a = array('a','b','c');

    // print_r(array_splice($a,1,2, array('x','y')));
    
 
    
    
    
    
    // function test_odd(int $var){
    //     if ($var % 2 == 0)
    //     return 0;

    //     else return 1;
    // }

    // $a1 = array (1,3,2,3,4);
    // print_r(array_filter($a1, "test_odd"));
    
    
    
    // $cars = array("Volvo","BMW","Toyota");
    // echo "Masinile mele preferate" . $cars[0] . $cars[1];

    // $age = array ("Peter" => "35", "Ben" => "37", "Joe" => "43");
    // echo "Varsta lui Peter este: " . $age['Peter'];
    // var_dump($age);
    
    
    
    
    
    // function myFunction(){
    //     global $x;
    //     $x = 8;
    //     echo "<p> Valoare lui x este: $x </p>";
    // }

    //     myFunction();
    //     echo "<p>Nu pot accesa $x in afara functiei</p>";
    
    
    
    ?>


    
</body>
</html>