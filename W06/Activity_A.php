<!-- ข้อ A
1. สร้าง class Square ประกอบด้วย
•properties คือ ความกว้างและความยาว
•สร้าง Constructor เพื่อกำหนดความกว้างและความยาวโดยอัตโนมัติในขณะที่สร้าง object
•สร้าง Method ชื่อ get_area() คำนวณพื้นที่สี่เหลี่ยม
2. สร้าง class Cube สืบทอดมาจาก class Square
•Property  ความสูง
•สร้าง Constructor เพื่อกำหนดความกว้าง ความยาว และความสูง โดยอัตโนมัติในขณะที่สร้าง object
•สร้าง Method ชื่อ get_area() คำนวณพื้นที่ผิวลูกบาศก์
•สร้าง Method ชื่อ get_vol() คำนวณ ปริมาตรลูกบาศก์
3. สร้าง object ของ class Square และแสดงผล ความกว้าง ความยาว พื้นที่สี่เหลี่ยม
4. สร้าง object ของ class Cube และแสดงผล ความกว้าง ความยาว ความสูง พื้นที่ผิว และปริมาตร -->
<?php
class Square {
    public $wide;
    public $long;
    public function __construct($w,$l)
    {
        $this->wide = $w;
        $this->long = $l;
    }
    public function get_area(){
        $area = $this->wide*$this->long;
        echo "Square with<br>Wide: $this->wide<br>";
        echo "Long: $this->long<br>";
        echo "Area: $area<br>";
    }

}

class Cube extends Square {
    public $high;

    public function __construct($w,$l,$h){
        parent::__construct($w,$l);
        $this->high = $h;
    }

    public function get_vol(){
        $volume = $this->wide*$this->long*$this->high;
        echo "Cube with<br>Wide: $this->wide<br>Long: $this->long<br>Volume: $volume<br>";
    }

    public function get_area(){
        $area = 2 * (($this->wide*$this->long) + ($this->wide*$this->high) + ($this->long*$this->high));
        echo "Cube Area: $area";
    }
}


$Square1 = new Square(20,20);
$Square1->get_area();

$cube1 = new Cube(3,5,8);
$cube1->get_vol();
$cube1->get_area();
?>