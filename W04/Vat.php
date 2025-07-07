<?php

$amount = $_GET['amount'];

$vat = $amount * 7/100;

echo "จำนวนเงินที่ต้องการคำนวณภาษีมูลค่าเพิ่ม $amount <br>";
echo "ภาษีมูลค่าเพิ่ม $vat บาท<br>";
echo "จำนวนเงินรวมภาษีมูลค่าเพิ่ม ",$amount+$vat," บาท<br>";

?>