<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
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
            color: #222;
        }
        table {
            width: 50%;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            /* border: 1px solid #000; */
        }
        .numbers {
            text-align: right;
        }
        </style>
</head>
<body>
<!-- ให้นักศึกษาเขียนสคริปต์ PHP เพื่อ
1. กำหนดตัวแปร 2 ตัว คือ จำนวนนักศึกษาที่เข้าเรียนสาขาเทคโนโลยีสารสนเทศ และจำนวนนักศึกษาต่อห้อง
2. ให้คำนวณหา จำนวนหมู่เรียน และ นักศึกษาที่ไม่เต็มห้อง
โดยแสดงผลดังตัวอย่างนี้
จำนวนนักศึกษาที่เข้าเรียนสาขาเทคโนโลยีสารสนเทศ  168 คน
จำนวนนักศึกษาต่อห้อง 30 คน
จัดหมู่เรียนได้ 6 ห้อง
โดยห้องที่ไม่เต็มมีนักศึกษา 18 คน
แล้วจัดการแสดงผลให้เป็นระเบียบ
3. ทดลองใช้ข้อมูลนำเข้าอื่น ๆ เพื่อตรวจสอบความถูกต้อง -->
<?php
$students = 120; // จำนวนผู้เรียน
$students_per_class = 70; // จำนวนผู้เรียนต่อห้อง
$std_dust = $students % $students_per_class;
$section = $students / $students_per_class;
?>
<h1>Assignment 1</h1>
<table>
    <tr>
        <td>จำนวนนักศึกษาที่เข้าเรียนสาขาเทคโนโลยีสารสนเทศ</td>
        <td class="numbers"><?php echo $students; ?> คน</td>
    </tr>
    <tr>
        <td>จำนวนนักศึกษาต่อห้อง</td>
        <td class="numbers"><?php echo $students_per_class; ?> คน</td>
    </tr>
    <tr>
        <td>จัดหมู่เรียนได้</td>
        <td class="numbers"><?php echo ceil($section); ?> ห้อง</td>
    </tr>
    <?php
    if ($std_dust !== 0) {
        echo 
        "<tr>
        <td>โดยห้องที่ไม่เต็มมีนักศึกษา</td>
        <td class='numbers'>", $std_dust," คน</td>
        </tr>";
    } else {
        echo 
        "<tr>
        <td colspan='2'>โดยไม่มีห้องที่นักศึกษาไม่เต็ม</td>
        </tr>";
    }
    ?>
</table>
</body>
</html>