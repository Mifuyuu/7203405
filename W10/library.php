<?php

interface Borrowable
{
    public function getTitle();
    public function getAuthor();
    public function isAvailable();
    public function borrow();
    public function return();
}

interface Printable
{
    public function printDetails();
}

class Book implements Borrowable, Printable
{
    private $title;
    private $author;
    private $isAvailable;

    public function __construct($t, $a)
    {
        $this->title = $t;
        $this->author = $a;
        $this->isAvailable = true;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function isAvailable()
    {
        return $this->isAvailable;
    }
    public function borrow()
    {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            echo "ยืมหนังสือ $this->title เรียบร้อยแล้ว<br>";
        } else {
            echo "หนังสือ $this->title ไม่อยู่ในห้องสมุด<br>";
        }
    }
    public function return()
    {
        $this->isAvailable = true;
        echo "คืนหนังสือ $this->title เรียบร้อยแล้ว<br>";
    }

    public function printDetails()
    {
        return "ชื่อหนังสือ $this->title ผู้แต่ง $this->author สถานะ " . ($this->isAvailable ? 'ยืมได้' : 'ถูกยืมไปแล้ว') . "<br>";
    }
}

class Library
{
    private $items = [];
    public function additem($i)
    {
        $this->items[] = $i;
    }
    public function borrowitem($t)
    {
        foreach ($this->items as $item) {
            if ($item->getTitle() === $t) {
                $item->borrow();
                return;
            }
        }
        echo "ไม่พบหนังสือ $t ในห้องสมุด";
    }
    public function returnitem($t)
    {
        foreach ($this->items as $item) {
            if ($item->getTitle() === $t) {
                $item->return();
                return;
            }
        }
        echo "ไม่พบหนังสือ $t ในห้องสมุด";
    }
    public function listAll(){
        echo "<h3>รายการหนังสือในห้องสมุด</h3>";
        foreach($this->items as $item){
            echo $item->printDetails()."<br>";
        }
    }
}

$library = new Library();
$book1 = new Book("พัฒนาเว็บด้วย PHP & MySQL", "Seksun");
$book2 = new Book("การสร้างเว็บแอปพลิเคชัน","NPRU Book");

$library->additem($book1);
$library->additem($book2);

$library->listAll();

$library->borrowitem("พัฒนาเว็บด้วย PHP & MySQL");

$library->listAll();

$library->borrowitem("พัฒนาเว็บด้วย PHP & MySQL");

$library->returnitem("พัฒนาเว็บด้วย PHP & MySQL");

$library->listAll();
?>