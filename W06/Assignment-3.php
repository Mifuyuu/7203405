<!-- 3. เพิ่ม ชื่อสำนักพิมพ์ และเพิ่มในฟังก์ชัน constructor 
และแสดงผลลัพธ์ทางหน้าจอ
-->
<?php

class Book_III {
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
}

$python = new Book_III("Introduction to Python", 250, "O'Reilly Media");
$python->show_info();
$chatgpt = new Book_III("How to ChatGPT?", 325, "OpenAI");
$chatgpt->show_info();
?>