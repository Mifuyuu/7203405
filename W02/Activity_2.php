<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 2</title>
</head>
<body>

<h1>Value Cal</h1>
<?php

$pro="B";
$times=50;
$min=220;
$per_month=300;
$per_min=0.75;
$per_times=3;

echo "ท่านใช้รายการส่งเสริมการขาย $pro<br>\n";

if ($pro=="A") {
    $value=$min*1.50;
    echo "คิดค่าใช้โทรศัพท์เป็นนาทีๆ ละ $per_min บาท<br>\n";
    echo "ท่านใช้โทรศัพท์ $min นาที<br>";

} else if ($pro=="B") {
    $value=$per_month;
    echo "คิดค่าใช้โทรศัพท์แบบเหมา $per_month บาท<br>\n";
    // echo "ท่านใช้โทรศัพท์ $times ครั้ง<br>";
} else {
    $value=$times*3;
    echo "คิดค่าใช้โทรศัพท์เป็นครั้งๆ ละ $per_times บาท<br>\n";
    echo "ท่านใช้โทรศัพท์ $times ครั้ง<br>";
}

echo "รวม ค่าใช้จ่าย $value บาท";
?>
<h1>Multi Line Star</h1>
<?php
for ($i = 1; $i < 10; $i++) {
    echo "*";
    for ($j = 1; $j < 10; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
<h1>Image Stacker</h1>
<?php
for ($i = 1; $i < 10; $i++) {
    echo "<img src='https://cdn.discordapp.com/attachments/859636131510616077/1386556698361204736/star.png?ex=685a230d&is=6858d18d&hm=cdca5dd63bd57c506ee0d9b620d0e51b593484f9910512fafb48a1ab45ea4f3b&' width='24px' height='24px'>";
    for ($j = 1; $j < 10; $j++) {
        echo "<img src='https://cdn.discordapp.com/attachments/859636131510616077/1386556698361204736/star.png?ex=685a230d&is=6858d18d&hm=cdca5dd63bd57c506ee0d9b620d0e51b593484f9910512fafb48a1ab45ea4f3b&' width='24px' height='24px'>";
    }
    echo "<br>";
}
?>
<h1>Number Sorter</h1>
<?php
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j;
    }
    echo "<br>";
}
?>
</body>
</html>