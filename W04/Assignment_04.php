<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
</head>

<body>
    <h1>Assignment 4</h1>
    <?php

    // 1. เขียนฟังก์ชันเพื่อคำนวณดอกเบี้ยเงินฝากจาก เงินต้น และอัตราดอกเบี้ยต่อไป และทดลองเรียกใช้ฟังก์ชันด้วยค่าต่าง ๆ กัน
    function calInterest($principal, $rate)
    {
        return ($principal * $rate) / 100;
    }
    echo "<h3>1.</h3>";
    echo "เงินฝาก 10000 บาท อัตราดอกเบี้ย 5% จะได้ " . calInterest(10000, 5) . " บาท<br><br>";

    ?>
    <!-- 2. สร้างฟอร์มเพื่อรับค่าเงินต้น อัตราดอกเบี้ย แล้วนำค่าที่ได้ไปใช้กับฟังก์ชันที่เขียนไว้ในข้อ 1 -->
    <hr>
    <h3>2.</h3>
    <form action="" method="post">
        <fieldset style="width: fit-content;">
            <legend>คำนวณดอกเบี้ยเงินฝาก</legend>
            <label>เงินต้น (บาท)</label>
            <input type="number" name="principal" required>

            <label>อัตราดอกเบี้ย (%)</label>
            <input type="number" name="interest_rate" required>

            <input type="submit" value="คำนวณดอกเบี้ย">
        </fieldset>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $principal = $_POST['principal'] ?? 0;
            $interest_rate = $_POST['interest_rate'] ?? 0;

            $interest = calInterest($principal, $interest_rate);
            echo "<p>ดอกเบี้ยจากเงินต้น $principal บาท ที่อัตราดอกเบี้ย $interest_rate% คือ $interest บาท</p>";
        }
        ?>
    </form>
    <!-- 3. สร้างฟอร์มเพื่อรับข้อมูลการลงทะเบียนสมาชิกสำหรับเว็บไซต์ท่องเที่ยวแห่งหนึ่ง ซึ่งต้องการเก็บข้อมูล ชื่อ นามสกุล เพศ และความสนใจแหล่งท่องเที่ยวของสมาชิก และเขียนสคริปต์เพื่อรับข้อมูลที่บันทึกมา พร้อมแสดงผลทางจอภาพอย่างเป็นระเบียบ -->
    <hr>
    <h3>3.</h3>
    <form action="" method="post">
        <fieldset style="width: fit-content;">
            <legend>ลงทะเบียนสมาชิก</legend>
            <label>ชื่อ</label>
            <input type="text" name="first_name" required>

            <label>นามสกุล</label>
            <input type="text" name="last_name" required>

            <label>เพศ</label>
            <select name="gender">
                <option value="male">ชาย</option>
                <option value="female">หญิง</option>
            </select>
            <label>ความสนใจแหล่งท่องเที่ยว</label>
            <select name="interest">
                <option value="beach">ชายหาด</option>
                <option value="mountain">ภูเขา</option>
                <option value="city">เมือง</option>
                <option value="Temple">วัด</option>
            </select>
            <input type="submit" value="ลงทะเบียน">
        </fieldset>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST['first_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $interest = $_POST['interest'] ?? '';
            echo "<h4>ข้อมูลสมาชิกที่ลงทะเบียน:</h4>";
            echo "<table border='0' cellpadding='5' cellspacing='0' style='border-collapse: collapse; width: 25%;text-align: left;'>";
            echo "<tr><th>ข้อมูล</th><th>รายละเอียด</th></tr>";
            echo "<tr><td>ชื่อ</td><td>$first_name</td></tr>";
            echo "<tr><td>นามสกุล</td><td>$last_name</td></tr>";
            echo "<tr><td>เพศ</td><td>$gender</td></tr>";
            echo "<tr><td>ความสนใจ</td><td>$interest</td></tr>";
            echo "</table>";
        }
        ?>
    </form>
    <hr>
    <!-- 4. สร้างฟอร์มเพื่อรับข้อมูลสินค้าหนึ่งตำบลหนึ่งผลิตภัณฑ์ โดยมีรายละเอียดสินค้า คือ รหัสสินค้า ชื่อสินค้า ขนาด จำนวนสินค้าที่มีอยู่ หน่วยนับ ราคาทุน ราคาขาย และเขียนสคริปต์เพื่อรับข้อมูลที่บันทึกมาแสดงผลทางจอภาพอย่างเป็นระเบียบดังไฟล์แนบ 
ทดลองใช้การส่งค่าจากฟอร์มโดยใช้วิธี  ‘POST’ -->
    <h3>4.</h3>
    <div style="display: flex; flex-direction: row; align-items: start; gap: 24px;">
        <form action="" method="post">
            <fieldset style="width: fit-content; display: flex; flex-direction: column;">
                <legend>ข้อมูลสินค้า</legend>
                <label>รหัสสินค้า</label>
                <input type="text" name="product_id" required>

                <label>ชื่อสินค้า</label>
                <input type="text" name="product_name" required>

                <label>ขนาด</label>
                <input type="text" name="size" required>

                <label>จำนวนสินค้าที่มีอยู่</label>
                <input type="number" name="quantity" required>

                <label>หน่วยนับ</label>
                <input type="text" name="unit" required placeholder="Ex. ชิ้น, กิโลกรัม, ลิตร">

                <label>ราคาทุน</label>
                <input type="number" name="cost" required>

                <label>ราคาขาย</label>
                <input type="number" name="price" required>

                <input type="submit" value="บันทึก">
            </fieldset>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $product_id = $_POST['product_id'] ?? '';
            $product_name = $_POST['product_name'] ?? '';
            $size = $_POST['size'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $unit = $_POST['unit'] ?? '';
            $cost = $_POST['cost'] ?? '';
            $price = $_POST['price'] ?? '';

            echo "<table border='0' cellpadding='5' cellspacing='0' style='border-collapse: collapse; width: 25%;text-align: left;'>";
            echo "<tr><th colspan='2'>รายการสินค้าหนึ่งตำบลหนึ่งผลิตภัณฑ์จังหวัดนครปฐม</th></tr>";
            echo "<tr><td>รหัส</td><td>$product_id</td></tr>";
            echo "<tr><td>ชื่อ</td><td>$product_name</td></tr>";
            echo "<tr><td>ขนาด</td><td>$size</td></tr>";
            echo "<tr><td>จํานวนสินค้าที่มีอยู่</td><td>$quantity $unit</td></tr>";
            echo "<tr><td>ราคาทุน</td><td>$cost</td></tr>";
            echo "<tr><td>ราคาขาย</td><td>$price</td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>