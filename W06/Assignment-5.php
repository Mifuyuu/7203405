<!-- 5. เพิ่ม ราคาทุน เพิ่มในฟังก์ชัน constructor และแสดงผลลัพธ์ทางหน้าจอ พร้อมคำนวณกำไร
-->
<?php

class Book_V {
    public $title;
    public $price;
    public $publisher;
    public $cost;

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
        echo "Cost: $this->cost <br>";
        echo "Profit: " . ($this->price - $this->cost) . "<br>";
    }
    public function __destruct()
    {
        echo "The book '$this->title' is destroyed.<br>";
    }
}

$python = new Book_V("Introduction to Python", 250, "O'Reilly Media", 150);
$python->show_info();
$chatgpt = new Book_V("How to ChatGPT?", 325, "OpenAI", 200);
$chatgpt->show_info();
?>