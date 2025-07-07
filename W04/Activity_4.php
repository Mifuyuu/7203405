<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 4</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* align-items: center; */
    }

    /* .hidden {
        display: none;
    } */
</style>
<?php
// Initialize background color with default if not set
$bgColor = isset($_GET['colors']) ? $_GET['colors'] : '#ffffff';
?>

<body style="background-color: <?php echo $bgColor; ?>">
    <form action="" method="get">
        <fieldset>
            <legend>ระบบคำนวณเกรด</legend>
            <label>ชื่อ</label>
            <input type="text" name="uname">

            <label>สาขาวิชา</label>
            <select name="major">
                <option value="IT">เทคโนโลยีสารสนเทศ</option>
                <option value="CS">วิทยาการคอมฯ</option>
                <option value="DGA">ดิจิตอลอาร์ต</option>
            </select>

            <label>กรอก<u>คะแนนเก็บ</u>เพื่อนำไปคำนวณเกรด</label>
            <input type="number" min="0" max="70" name="c_point" id="c_point" required>

            <label>กรอก<u>คะแนนสอบ</u>เพื่อนำไปคำนวณเกรด</label>
            <input type="number" min="0" max="30" name="t_point" id="t_point" required>

            <input type="submit" value="ตรวจสอบเกรด">
            <?php

            // 1. ให้นักศึกษาสร้างฟอร์มเพื่อรับคะแนนสอบ แล้วนำมาคำนวณหาเกรด และแสดงผลคะแนน และเกรดที่ได้

            $uname = $_GET['uname'];
            $major = $_GET['major'];
            $c_point = $_GET['c_point'];
            $t_point = $_GET['t_point'];

            $total_point = $c_point + $t_point;

            if ($total_point >= 80) $grade = "A";
            elseif ($total_point >= 70) $grade = "B";
            elseif ($total_point >= 60) $grade = "C";
            elseif ($total_point >= 50) $grade = "D";
            else $grade = "E";

            echo "<div class='hidden'>";
            echo "ชื่อ ", $uname, "<br>";
            echo "สาขา ", $major, "<br>";
            echo "คุณมีคะแนนเก็บ ", $c_point, "<br>";
            echo "คุณมีคะแนนสอบ ", $t_point, "<br>";
            echo "คุณได้เกรด ", $grade;
            echo "</div>"

            ?>
        </fieldset>
    </form>
    <form action="" method="get">
        <fieldset>
            <legend>รายการสีที่ชอบ</legend>
            <label>เลือกสีที่ชอบ</label>
            <select name="colors">
                <option value="#333333">เทาเข้ม</option>
                <option value="Yellow">เหลือง</option>
                <option value="Blue">น้ำเงิน</option>
                <option value="Pink">ชมพู</option>
                <option value="Purple">ม่วง</option>
            </select>
            <input type="submit" value="เลือก">
        </fieldset>
    </form>
    <form action="" method="get">
        <fieldset>
            <legend>เลือกปี</legend>
            <label>ปี</label>
            <select name="select_year">
                <?php
                $year = date("Y") + 543;
                while ($year >= 2530) {
                    echo "<option value='$year'>$year</option>";
                    $year--;
                }
                ?>
            </select>
            <input type="submit" value="เลือก">
            <?php
            $birth = $_GET['select_year'];
            echo "คุณเกิดในปี ", $birth;
            ?>
        </fieldset>
    </form>
    <?php

    function Fahrenheit($a)
    {
        $cool = ($a * 1.8) + 32;
        return $cool;
    }
    function Celsius($a) {
        $cool=($a/1.8)-32;
        return $cool;
    }
    ?>
    <form method="post">
        <fieldset>
            <legend>แปลงองศา</legend>
            <label>ใส่องศาเซลเซียส</label>
            <input type="text" name="cell">
            <input type="submit" value="แปลงองศา">

            <?php
            $cell = $_POST['cell'];
            echo "<br>$cell องศาเซลเซียล เท่ากับ ",Fahrenheit($cell)," องศาฟาเรนไฮต์";
            ?>
        </fieldset>
    </form>
    <form method="post">
        <fieldset>
            <legend>แปลงองศาแบบตัวเลือก</legend>
            <label>องศา</label>
            <input type="number" name="Degree">
            <label>แปลงเป็น</label>
            <select name="convert">
                <option value="Celsius">เซลเซียล</option>
                <option value="Fahrenheit">ฟาเรนไฮต์</option>
            </select>
            <input type="submit" value="แปลงค่า">
            <?php
            $degree = $_POST['Degree'];
            $type = $_POST['convert'];
            if ($type=="Celsius") echo "<br>เท่ากับ ",Celsius($degree)," องศาเซลเซียล";
            elseif ($type=="Fahrenheit") echo "<br>เท่ากับ ",Fahrenheit($degree)," องศาฟาเรนไฮน์";
            ?>
        </fieldset>
    </form>
</body>

</html>