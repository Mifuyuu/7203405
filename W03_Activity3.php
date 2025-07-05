<?php
// 1. สร้างอาร์เรย์แบบดัชนีเพื่อเก็บข้อมูลเดือน
// เช่น มกราคม กุมภาพันธ์ … ธันวาคม เป็นต้น แสดงผลอาร์เรย์นี้โดยใช้การทำงานซ้ำ
// แล้วสร้างอาร์เรย์แบบดัชนีอีกตัวหนึ่งเพื่อเก็บจำนวนวันในแต่ละเดือน 
// แล้วนำอาร์เรย์ทั้งสองตัวมาแสดงผล เช่น
// เดือน มกราคม มี 31 วัน
// เดือน กุมภาพันธ์ มี 28 วัน
// ...

$month[0] = "มกราคม";
$month[1] = "กุมภาพันธ์";
$month[2] = "มีนาคม";
$month[3] = "เมษายน";
$month[4] = "พฤษภาคม";
$month[5] = "มิถุนายน";
$month[6] = "กรกฎาคม";
$month[7] = "สิงหาคม";
$month[8] = "กันยายน";
$month[9] = "ตุลาคม";
$month[10] = "พฤศจิกายน";
$month[11] = "ธันวาคม";

$dayhave[0] = 31;
$dayhave[1] = 28;
$dayhave[2] = 31;
$dayhave[3] = 30;
$dayhave[4] = 31;
$dayhave[5] = 30;
$dayhave[6] = 31;
$dayhave[7] = 31;
$dayhave[8] = 30;
$dayhave[9] = 31;
$dayhave[10] = 30;
$dayhave[11] = 31;

// for ($i = 0; $i < sizeof($month); $i++) {
//     echo "เดือนที่ " . ($i + 1) . " คือเดือน ", $month[$i], " และมีวันทั้งหมด ", $dayhave[$i], "<br>";
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 3 by Seksun</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th,tr,td {
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
    <h2>Activity 3 - 1: Array แบบดัชนี</h2>
    <table>
        <tr>
            <td>เดือน</td>
            <td>จำนวนวัน</td>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($month); $i++) {
            echo "<tr><td>" . ($i + 1) . " ", $month[$i], "</td><td>", $dayhave[$i], "</td></tr>";
        }
        ?>
    </table>
    <hr>
    <h2>Activity 3 - 2: Array แบบ ความสัมพันธ์</h2>
    <table>
        <tr>
            <td>เดือน</td>
            <td>จำนวนวัน</td>
        </tr>
        <?php
        // 2. สร้างอาร์เรย์ชนิดสัมพันธ์เพื่อเก็บข้อมูลเดือนเช่นเดียวกับข้อ 1 แต่ให้มีคีย์เป็นดังนี้ Jan, Feb, Mar, … เป็นต้น แสดงผลอาร์เรย์นี้โดยใช้การทำงานซ้ำ 
        $r_month = array("January" => 31, "February" => 28, "March" => 31, "April" => 30, "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30, "October" => 31, "November" => 30, "December" => 31);

        foreach ($r_month as $n_month => $d_month) {
            echo "<tr><td>$n_month</td><td>$d_month</td></tr>";
        }
        ?>
    </table>
    <hr>
    <h2>Activity 3 - 3: 2D Array</h2>
    <?php
    // 3 สร้างอาร์เรย์ชนิดหลายมิติเพื่อเก็บข้อมูลรายการสินค้า
    // 3 รายการ ดังนี้
    //  รหัสสินค้า ชื่อสินค้า ขนาด ราคา
    // 8852222610888 ยาสีฟัน Freshy 100cc 43.50
    // 8852222710999 ยาสีฟัน Freshy 200cc 65.00
    // 8852222888000 แปรงสีฟัน Freshy S 56.00
    //  แสดงผลรายการอาร์เรย์สองมิติดังกล่าวในตารางโดยใช้โครงสร้างการทำงานซ้ำ
    // for
    // และคำนวณค่าภาษีมูลค่าเพิ่มของสินค้าแต่ละรายการเพิ่มเป็นอีกหนึ่งคอลัมน์ในตาราง

    $stock = array(
        array("8852222610888", "ยาสีฟัน Freshy", "100cc", 43.50),
        array("8852222710999", "ยาสีฟัน Freshy", "200cc", 65.00),
        array("8852222888000", "แปรงสีฟัน Freshy", "S", 56.00)
    );
    $round=sizeof($stock);
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Size</th><th>Price</th><th>Price + Vat</th></tr>";
    for ($i=0; $i < $round; $i++) { 
        echo "<tr><td>".$stock[$i][0]."</td><td>".$stock[$i][1]."</td><td>".$stock[$i][2]."</td><td>".$stock[$i][3]."</td><td>".($stock[$i][3]+($stock[$i][3]*0.07))."</td></tr>";
        }
    echo "</table>";
    ?>
</body>

</html>