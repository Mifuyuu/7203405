<?php
interface Turn
{
    public function turnOn();
    public function turnOff();
    public function ChgChan($new);
}

interface Volume
{
    public function volUp();
    public function volDown();
}

class TV implements Turn, Volume
{
    public $channel = 33;
    public $volume = 20;
    public function turnOn()
    {
        echo "เปิดแล้ว<br>";
    }
    public function turnOff()
    {
        echo "ปิดแล้ว<br>";
    }
    public function ChgChan($new)
    {
        echo "เปลี่ยนจากช่อง $this->channel เป็น ";
        $this->channel = $new;
        echo "$this->channel แล้ว <br>";
    }

        public function volUp(){
            echo "เพิ่มความดังจาก $this->volume เป็น ";
            $this->volume +=2;
            echo $this->volume." แล้ว <br>";
        }
        public function volDown(){
            echo "ลดความดังจาก $this->volume เป็น ";
            $this->volume -=2;
            echo $this->volume." แล้ว <br>";
        }
}

class Radio implements Turn
{
    public $channel = 33;
    public function turnOn()
    {
        echo "เปิดแล้ว<br>";
    }
    public function turnOff()
    {
        echo "ปิดแล้ว<br>";
    }
    public function ChgChan($new)
    {
        echo "เปลี่ยนจากช่อง $this->channel เป็น ";
        $this->channel = $new;
        echo "$this->channel แล้ว <br>";
    }
}

$tv = new TV();
$tv->turnOn();
$tv->ChgChan(35);
$tv->ChgChan(89);
$tv->volUp();
$tv->volDown();
$tv->volDown();
$tv->turnOff();

$radio = new Radio();
$radio->turnOn();
$radio->ChgChan(35);
$radio->ChgChan(89);
$tv->volUp();
$tv->volDown();
$tv->volDown();
$radio->turnOff();
