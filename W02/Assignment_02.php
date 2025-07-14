<!-- 1. ใช้การทำงานตามเงื่อนไข if…elseif…else เพื่อควบคุมดังต่อไปนี้
(1)       กำหนดค่าให้กับตัวแปร $acctype (ประเภทบัญชีเงินฝาก) และ $amount (จำนวนเงินฝาก) ด้วยตัวดำเนินการแบบกำหนดค่า โดยกำหนดค่าตามลำดับดังต่อไปนี้ ‘S’ และ 2500000
(2)       สร้างการทำงานตามเงื่อนไข if เพื่อกำหนดอัตราดอกเบี้ยที่แตกต่างกันดังนี้
ประเภทบัญชีเงินฝาก ‘S’
จำนวนเงินฝากน้อยกว่า 1 ล้านบาท อัตราดอกเบี้ยร้อยละ 1.5
จำนวนเงินฝากตั้งแต่ 1 ล้านบาท อัตราดอกเบี้ยร้อยละ 1.75
ประเภทบัญชีเงินฝาก ‘3’ อัตราดอกเบี้ยร้อยละ 2
ประเภทบัญชีเงินฝาก ‘6’ อัตราดอกเบี้ยร้อยละ 2.25
ประเภทบัญชีเงินฝาก ‘Y’ อัตราดอกเบี้ยร้อยละ 2.5
(3)       แสดงผลข้อความดังต่อไปนี้
 
ประเภทบัญชีเงินฝาก ‘S’ จำนวนเงินฝาก 2 ล้านบาท
ท่านได้รับอัตราดอกเบี้ยร้อยละ 1.75
 
(4)       ทดลองเปลี่ยนค่าตัวแปร $acctype และ $amount เป็นค่าอื่น ๆ ให้ครบทุกกรณี เพื่อตรวจสอบความถูกต้อง -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1,h2 {
            color: #333;
        }
        .container {
            display: flex;
            /* flex-direction: column; */
            gap: 10%;
        }
    </style>
</head>
<body>
    <h1>Assignment 2 - 1</h1>
<?php

$acctype = '6';
$amount = 2000000;

if ($acctype == 'S') {
    if ($amount < 1000000) {
        $interestRate = 1.5;
    } else {
        $interestRate = 1.75;
    }
} elseif ($acctype == '3') {
    $interestRate = 2;
} elseif ($acctype == '6') {
    $interestRate = 2.25;
} elseif ($acctype == 'Y') {
    $interestRate = 2.5;
}

echo "ประเภทบัญชีเงินฝาก '$acctype' จํานวนเงินฝาก $amount บาท<br>";
echo "ท่านได้รับอัตราดอกเบี้ยร้อยละ $interestRate<br>";
?>
<!-- 2.    เขียนสคริปต์เพื่อทำงานตามข้อ 1 โดยใช้การทำงานตามเงื่อนไข switch -->
    <h1>Assignment 2 - 2</h1>
    
<?php
switch ($acctype) {
    case 'S':
        if ($amount < 1000000) {
            $interestRate = 1.5;
        } else {
            $interestRate = 1.75;
        }
        break;
    case '3':
        $interestRate = 2;
        break;
    case '6':
        $interestRate = 2.25;
        break;
    case 'Y':
        $interestRate = 2.5;
        break;
    default:
        $interestRate = 0;
        break;
}

echo "ประเภทบัญชีเงินฝาก '$acctype' จํานวนเงินฝาก $amount บาท<br>";
echo "ท่านได้รับอัตราดอกเบี้ยร้อยละ $interestRate<br>";
?>

<!-- 3.    ใช้การควบคุมการทำงานซ้ำ while เพื่อทำงานดังต่อไปนี้
(1)       กำหนดค่าให้กับตัวแปร $year (ปี พ.ศ.) ด้วยตัวดำเนินการแบบกำหนดค่าให้มีค่าเป็นปีปัจจุบัน
(2)       ให้แสดงผลค่าปีปัจจุบัน และปีย้อนหลังไปรวม 20 ปี
(3)       นำไปใช้กับกล่องรายการ 
(4)       ใช้การทำงานซ้ำ do…while และ for เพื่อทำงานในข้อนี้ -->
<div class="container">
    <div>
        <h1>Assignment 2 - 3 (While)</h1>
        <?php
        $year = date("Y") + 543;
        while ($year >= date("Y") + 543 - 19) {
            echo "<option value='$year'>$year</option>";
            $year--;
        }
        ?>
    
    </div>
    
    <div>
        <h1>Assignment 2 - 3 (Do While)</h1>
        <?php
        $year = date("Y") + 543;
    
        do {
            echo "<option value='$year'>$year</option>";
            $year--;
        } while ($year >= date("Y") + 543 - 19);
    
        ?>
    </div>
    
    <div>
        <h1>Assignment 2 - 3 (For)</h1>
        <?php
        $year = date("Y") + 543;
        for ($i = 0; $i < 20; $i++) {
            echo "<option value='$year'>$year</option>";
            $year--;
        }
        ?>
    </div>
</div>
</body>
</html>