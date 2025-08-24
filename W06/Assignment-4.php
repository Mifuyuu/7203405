<!-- 4. สร้าง destructor เพื่อทำลาย object เมื่อจบสคริปต์ โดยแสดงข้อความให้ทราบว่า object นั้น ถูกทำลายแล้ว 
-->
<?php

class Book_IV {
    public $title;
    public $price;
    public $publisher;

    public function __construct($t, $p, $pub)
    {
        $this->title = $t;
        $this->price = $p;
        $this->publisher = $pub;
    }

    public function show_info()
    {
        echo "Title: $this->title <br>";
        echo "Price: $this->price <br>";
        echo "Publisher: $this->publisher <br>";
    }
    public function __destruct()
    {
        echo "The book '$this->title' is destroyed.<br>";
    }
}

$python = new Book_IV("Introduction to Python", 250, "O'Reilly Media");
$python->show_info();
$chatgpt = new Book_IV("How to ChatGPT?", 325, "OpenAI");
$chatgpt->show_info();
?>