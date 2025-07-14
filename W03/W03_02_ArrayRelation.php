<?php

    echo "<h3>Array ชนิด Relation</h3>";

    // $mark["Jingliu"]=86;
    // $mark["Jingyuan"]=75;
    // $mark["March"]=69;
    $total=0;

    $mark=array("Jingliu"=>90, "Jingyuan"=>88, "March"=>22);

    foreach($mark as $name=>$score){
        echo $name, " ได้ ",$score, " คะแนน<br>";
        $total+=$score;
        }
    echo "คะแนนเฉลี่ย คือ ",$total;

?>