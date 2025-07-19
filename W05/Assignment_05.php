<?php
// 1. สร้างคลาส Person รับชื่อ, อายุ, และอาชีพ ผ่าน constructor
// Properties: ชื่อ อายุ อาชีพ
// Method 
// __construct(ชื่อ อายุ อาชีพ)
// introduce() ที่แสดงข้อความว่า: สวัสดีครับ/ค่ะ ผม/ฉันชื่อ [ชื่อ] อายุ [อายุ] ปี ทำงานเป็น [อาชีพ]  โดย ถ้าอายุ < 18 ให้ใช้คำว่า “ผม/ฉัน” ตามเพศ (เพิ่ม property gender ถ้าต้องการ)

class Person {
    public $name;
    public $age;
    public $job;
    public $gender;

    public function __construct($name, $age, $job, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->job = $job;
        $this->gender = $gender;
    }

    public function introduce() {
        $greeting = ($this->gender === 'male') ? 'สวัสดีครับ' : 'สวัสดีค่ะ';

        if ($this->age < 18) {
            $pronoun = 'ฉัน';
        } else {
            $pronoun = ($this->gender === 'male') ? 'ผม' : 'ฉัน';
        }

        echo "{$greeting} {$pronoun}ชื่อ {$this->name} อายุ {$this->age} ปี ทำงานเป็น {$this->job}<br>";
    }
}

echo "<h3>Assignment 5 - 1</h3>";
$person1 = new Person("บัณฑิตา", 14, "นักเรียน", "female");
$person1->introduce();

$person2 = new Person("เสกสรรญ", 17, "นักเรียน", "male");
$person2->introduce();

$person3 = new Person("กานดา", 25, "พยาบาล", "female");
$person3->introduce();

$person4 = new Person("สมศรี",17, "นักศึกษา", "female");
$person4->introduce();

$person5 = new Person("กิตติ",21, "Developer", "male");
$person5->introduce();


// 2. สร้างคลาสของสี่เหลี่ยม ที่มี property คือ ความกว้างและความยาว แล้วสร้าง method เพื่อคำนวณพื้นที่ และเส้นรอบรูป สร้าง object พร้อมแสดงผล 
// Properties: $width, $height (private)
// Methods:
// __construct($width, $height)
// calculateArea() คืนค่าพื้นที่ (กว้าง × ยาว)
// calculatePerimeter() คืนค่าความยาวรอบรูป (2×(กว้าง+ยาว))
// isSquare() คืนค่า true ถ้าเป็นสี่เหลี่ยมจัตุรัส

class Rectangle {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }

    public function calculatePerimeter() {
        return 2 * ($this->width + $this->height);
    }

    public function isSquare() {
        return $this->width === $this->height;
    }
}

echo "<h3>Assignment 5 - 2</h3>";
$rectangle1 = new Rectangle(5, 3);
echo "<br>Rectangle 1:<br>";
echo "Area: " . $rectangle1->calculateArea() . "<br>";
echo "Perimeter: " . $rectangle1->calculatePerimeter() . "<br>";
echo "Is square: " . ($rectangle1->isSquare() ? "true" : "false") . "<br>";

$rectangle2 = new Rectangle(4, 4);
echo "<br>Rectangle 2:<br>";
echo "Area: " . $rectangle2->calculateArea() . "<br>";
echo "Perimeter: " . $rectangle2->calculatePerimeter() . "<br>";
echo "Is square: " . ($rectangle2->isSquare() ? "true" : "false") . "<br>";

?>