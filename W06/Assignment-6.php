<!--
6. สร้าง Class นิตยสาร ซึ่งสืบทอดมาจาก Class หนังสือ โดยมี property ที่เพิ่มขึ้นคือ ความถี่ในการออกนิตยสารนั้น เป็น รายสัปดาห์ รายปักษ์ รายเดือน เป็นต้น
6.1 สร้าง object ขื่อ $times และ $weeknews
6.2 $times เป็น นิตยสาร Times Magazine ราคา 59 สำนักพิมพ์ Times เป็นนิตยสารรายเดือน
6.3 $weeknews  ป็น นิตยสาร Weekly News Magazine ราคา 39 สำนักพิมพ์ Manager เป็นนิตยสารรายสัปดาห์
และแสดงผลลัพธ์ทางหน้าจอ
-->
<?php

class Book_VI {
    public $title;
    public $price;
    public $publisher;
    public $cost;
    public $frequency;

    public function __construct($t, $p, $pub, $c)
    {
        $this->title = $t;
        $this->price = $p;
        $this->publisher = $pub;
        $this->cost = $c;
    }

    public function show_info()
    {
        echo "Title: $this->title <br>";
        echo "Price: $this->price <br>";
        echo "Publisher: $this->publisher <br>";
        // echo "Cost: $this->cost <br>";
        // echo "Profit: " . ($this->price - $this->cost) . "<br>";
    }

    // public function __destruct()
    // {
    //     echo "The book '$this->title' is destroyed.<br>";
    // }
}

class Magazine extends Book_VI {
    public $frequency;
    public function __construct($t, $p, $pub, $c, $f)
    {
        parent::__construct($t, $p, $pub, $c);
        $this->frequency = $f;
        $this->show_info();
        echo "Frequency: $this->frequency <br><br>";
    }
}

$times = new Magazine("Times Magazine", 59, "Times", 39, "Monthly");
$weeknews = new Magazine("Weekly News Magazine", 39, "Manager", 29, "Weekly");

?>