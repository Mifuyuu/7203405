<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #222;
        }
        h2 {
            color: #222;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Assignment 3</h1>
<?php
// 1. สร้างอาร์เรย์แบบดัชนีเพื่อเก็บข้อมูลยอดขายรายวันในสัปดาห์หนึ่งของร้านอาหารแห่งหนึ่ง ดังนี้
//     24,000   27,000   25,000   28,000   32,000   35,000   30,000
// แสดงผลอาร์เรย์นี้โดยใช้โครงสร้างการทำงานซ้ำ และคำนวณยอดขายรวมและยอดขายเฉลี่ย
$totalSales = 0;
$sales = array(24000, 27000, 25000, 28000, 32000, 35000, 30000);

echo "<h2>ยอดขายรายวันในสัปดาห์</h2>";

for ($i = 0; $i < count($sales); $i++) {
    echo "วันที่ " . ($i + 1) . " ขายได้ " . $sales[$i] . " บาท<br>";
    $totalSales += $sales[$i];
}

echo "<br>ยอดขายรวม: " . $totalSales . "<br>";
echo "ยอดขายเฉลี่ย: " . $totalSales / count($sales);

// 2.  สร้างตัวแปรที่มีคีย์แบบสัมพันธ์ เพื่อเก็บข้อมูลสกุลเงินตราและอัตราแลกเปลี่ยนประจำวันของแต่ละประเทศ อย่างน้อย 10 ประเทศ แล้วแสดงผลโดยใช้โครงสร้างการทำงานซ้ำ

echo "<h2>อัตราแลกเปลี่ยนสกุลเงิน ต่อ 1 ดอลลาร์</h2>";

$coins = array(
    "Japan - JPY" => 155.20,
    "Thailand - THB" => 36.00,
    "United Kingdom - GBP" => 0.78,
    "French - EUR" => 0.92,
    "Canada - CAD" => 1.36,
    "Australia - AUD" => 1.51,
    "India - INR" => 83.40,
    "Korea - KRW" => 1390,
    "Switzerland - CHF" => 0.89,
    "China - CNY" => 7.25
);

foreach ($coins as $country => $rate) {
    echo "ประเทศ ".$country." มีอัตราแลกเปลี่ยนประจำวัน ที่ ".$rate."<br>";
}


// 3. สร้างอาร์เรย์ชนิดหลายมิติเพื่อเก็บข้อมูลพนักงาน 5 คน โดยมีข้อมูลประกอบด้วย
// รหัสพนักงาน ชื่อ นามสกุล แผนก และเงินเดือน 
// แล้วแสดงผลรายการอาร์เรย์สองมิติดังกล่าวโดยใช้โครงสร้างการทำงานซ้ำ และหาเงินเดือนรวม และเงินเดือนเฉลี่ย
// สมมติว่า บริษัทหักภาษี ณ ที่จ่ายพนักงานทุกคน 3 % ให้คำนวณ และแสดงภาษีที่ถูกหัก พร้อมเงินเดือนคงเหลือ

$totalMonthlySalary = 0;
echo "<h2>ข้อมูลพนักงาน</h2>";

$employee = array(
    array("E001", "สมชาย", "ใจดี", "การตลาด", 30000),
    array("E002", "สมหญิง", "สุขใจ", "บัญชี", 35000),
    array("E003", "สมศักดิ์", "สุขสม", "ฝ่ายจัดการ", 40000),
    array("E004", "สมศรี", "ใจรัก", "รองผู้บริหาร", 45000),
    array("E005", "สมปอง", "สบายดี", "ผู้บริหาร", 50000)
);

foreach ($employee as $country => $rate) {
    $totalMonthlySalary += $rate[4]; // คำนวณเงินเดือนรวม
    $tax = $rate[4] * 0.03; // คำนวณภาษีที่ถูกหัก
    $netSalary = $rate[4] - $tax; // คำนวณเงินเดือนคงเหลือ
    echo "รหัสพนักงาน: ".$rate[0].", ชื่อ: ".$rate[1].", นามสกุล: ".$rate[2].", แผนก: ".$rate[3]." เงินเดือน: ".$rate[4]." บาท, ภาษีที่ถูกหัก: ".$tax." บาท, เงินเดือนคงเหลือ: ".$netSalary." บาท<br>";
}
echo "เงินเดือนรวม: ".$totalMonthlySalary." บาท<br>";
echo "เงินเดือนเฉลี่ย: ".($totalMonthlySalary / count($employee))." บาท<br>";
?>    
</body>
</html>