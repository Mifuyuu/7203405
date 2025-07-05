<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seksun Hlamwanna</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            gap: 24px;
            font-size: 24px;
            /* background: #000; */
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        table {
            /* text-align: center; */
            /* background-color: #333; */
            /* color: #fff; */
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>Interest Calculator by Seksun</h1>
    <form action="index.php" method="post">
        <input type="number" name="deposit" id="deposit" placeholder="เงินฝาก">
        <input type="number" name="interest" id="interest" placeholder="ดอกเบี้ย">
        <input type="number" name="year" id="year" placeholder="ปี">
        <input type="submit" value="Submit">
    </form>
    <?php
        // 1. เขียน PHP เพื่อคำนวณดอกเบี้ย โดยแสดงผลดังนี้
        // เงินฝาก  xxxx บาท
        // อัตราดอกเบี้่ย x %
        // เมื่อครบ 1 ปีจะได้ดอกเบี้ย xxxx บาท
        // เมื่อรวมดอกเบี้ยและเงินต้นเป็น xxxx บาท
        // โดยกำหนดตัวแปรเงินฝาก และอัตราดอกเบี้ย

        
        $_POST["deposit"];
        $_POST["interest"];
        $_POST["year"];
        $result = $_POST["deposit"] * $_POST["interest"] / 100;
        $total = $_POST["deposit"] + $result;
        // echo "<br>เงินฝาก ", $_POST["deposit"]," บาท";
        // echo "<br>อัตราดอกเบี้ย ", $_POST["interest"]," %";
        // echo "<br>เมื่อครบ ", $_POST["year"], " ปีจะได้ดอกเบี้ย $result บาท";
        // echo "<br>$total บาท";
    ?>
    <table>
        <tr>
            <td>เงินฝาก</td>
            <td><?php echo $_POST['deposit']; ?></td>
        </tr>
        <tr>
            <td>อัตราดอกเบี้ย</td>
            <td><?php echo $_POST['interest']; ?>%</td>
        </tr>
        <tr>
            <td>จำนวนปี</td>
            <td><?php echo $_POST['year']; ?></td>
        </tr>
        <tr>
            <td>จะได้รับดอกเบี้ย</td>
            <td><?php echo $result; ?></td>
        </tr>
        <tr>
            <td>ยอดเงิน  รวม</td>
            <td><?php echo $total; ?></td>
        </tr>
    </table>
    <hr width="100%">
    <?php
    // 2. เขียน PHP เพื่อคำนวณค่าสินค้า โดยกำหนดตัวแปร ชื่อสินค้า ราคาต่อหน่วย จำนวนสินค้า โดยแสดงผลดังตัวอย่าง
    // ชื่อสินค้า  xxxxxxxxxxxxxxxxxxxxxx
    // ราคาต่อหน้วย xxxxx บาท
    // จำนวนสินค้า   xxx ชิ้น
    // ราคารวม  xxxxx บาท
    // โดยแสดงผลให้เป็นระเบียบ

    $product_name = "Goggles";
    $price_per_unit = 199;
    $amount = 10;
    $total = $amount * $price_per_unit;
    ?>
    <table>
        <tr>
            <td>ชื่อสินค้า</td>
            <td><?php echo $product_name; ?></td>
        </tr>
        <tr>
            <td>ราคาต่อหน้วย</td>
            <td><?php echo $price_per_unit; ?></td>
        </tr>
        <tr>
            <td>จำนวนสินค้า</td>
            <td><?php echo $amount; ?></td>
        </tr>
        <tr>
            <td>ราคารวม</td>
            <td><?php echo $total; ?></td>
        </tr>
    </table>
</body>
</html>