<h1>If else</h1>
<?php

    $point = 89;
    $user="Seksun Hlamwanna";
    $date=date("d-m-Y");

    function pass($point){
        if ($point>=80){
            return "A";
        }
        if ($point>=70){
            return "B";
        }
        if ($point>=60){
            return "C";
        }
        if ($point>=50){
            return "D";
        }
        else {
            return "F";
        }
        
    }

    if ($point>=80) {
        echo "Congrats! Mr.$user you pass with $point point and get grade ".pass($point)." on $date";
    }
    else if ($point>=70) {
        echo "Congrats! Mr.$user you pass with $point point and get grade on $date";
    }
    else if ($point>=66) {
        echo "Congrats! Mr.$user you pass with $point point and get grade C+ on $date";
    }
    else if ($point>=56) {
        echo "Congrats! Mr.$user you pass with $point point and get grade D+ on $date";
    }
    else if ($point>=50) {
        echo "Congrats! Mr.$user you pass with $point point and get grade D on $date";
    }
    else if ($point<50) {
        echo "Sorry! Mr.$user you Fail";
    }

    ?>