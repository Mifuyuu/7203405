<?php
    
    //Array แบบดัชนี

    // $name[0]="Sam";
    // $name[1]="firefly";
    // $name[2]="Castorice";

    $name = array("Kavin","Qingque","March","Jingliu","Jingyuan","Pala");
    $point = array(89,87,76,67,59,40);
    $mark=rand(0,100);
    $total=0;
    $value=sizeof($name);


    for($i=0;$i<$value;$i++) {
        if ($point[$i]>=80) {
            $grade="A";
        }elseif($point[$i]>=70){
            $grade="B";
        }elseif($point[$i]>=60){
            $grade="C";
        }elseif($point[$i]>=50){
            $grade="D";
        }else{
            $grade="E";
        }
        $total+= $point[$i];
        echo "นักศึกษาที่ได้ลำดับที่ ".($i+1)." คือ ", $name[$i]," ด้วยคะแนน ",$point[$i]," คะแนน เกรด $grade<br>";
    }
    echo "คะแนนรวมทั้งหมด $total <br>";
    echo "คะแนนเฉลี่ย คือ ",$total/$value;
    echo $mark;
?>