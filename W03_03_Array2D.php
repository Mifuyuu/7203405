<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,
        tr,
        td {
            border: 1px solid #333;
            border-collapse: collapse;
            text-align: center;
            width: 20%;
        }
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<?php

    echo "<h1>Array แบบ 2 มิติ</h1>";

    //Single Line
    // $student[0] = array("Skirk", 88);
    // $student[1] = array("Castorice", 78);
    // $student[2] = array("Firefly", 65);

    //Multi Line
    $student = array(
        array("Skirk", 88),
        array("Castorice", 78),
        array("Jingyuan", 55),
        array("Jingliu", 46),
        array("Firefly", 65));

    $round = sizeof($student);
    $total=0;
    echo "<table>";
    echo "<tr><th>Name</th><th>Point</th><th>Grade</th></tr>";
    for ($i=0; $i < $round; $i++) {
        if ($student[$i][1]>=80) {
            $grade="A";
        }elseif($student[$i][1]>=70){
            $grade="B";
        }elseif($student[$i][1]>=60){
            $grade="C";
        }elseif($student[$i][1]>=50){
            $grade="D";
        }else{
            $grade="E";
        }
        echo "<tr><td>",$student[$i][0],"</td><td>",$student[$i][1],"</td><td>$grade</td></tr>";
        $total+=$student[$i][1];
    }
    echo "<tr><td colspan='3'>คะแนนเฉลี่ย ".$total/$round."</td></tr>";
    echo "</table>";

?>
</body>
</html>