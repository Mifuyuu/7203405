<form action="" method="post">
    <fieldset>
        <legend>คำนวณส่วนลด</legend>
        <label>ราคาสินค้า</label>
        <input type="number" name="price">
        <label>สมาชิกระดับ</label>
        <select name="discount_percent">
            <option value="5">Bornze</option>
            <option value="10">Silver</option>
            <option value="15">Gold</option>
            <option value="20">Platinum</option>
        </select>
        <input type="submit">
    </fieldset>
</form>

<?php
$price = $_POST['price'];
$tier = $_POST['discount_percent'];
function discount ($a,$b){
    $disc = $a * $b / 100;
    return $disc;
}

$disc=discount($price,$tier);

echo "คุณซื้อสินค้าราคา ",$price," บาท<br>";
echo "คุณได้รับส่วนลด ",$disc," บาท<br>";
echo "จำนวนเงินที่ต้องชำระ ",$price-$disc," บาท";

?>