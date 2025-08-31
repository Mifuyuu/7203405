<!--
*** ข้อ 2 Person
-->

<?php

abstract class Employee { //1. สร้าง abstract class Employee

    protected $first_name; //1.1 มี property เป็นแบบที่สามารถเรียกใช้ได้ในคลาสที่สืบทอด คือ ชื่อ นามสกุล 
    protected $last_name;

    public function __construct($fn,$ln) //1.2 สร้าง constructor โดยรับค่าชื่อ นามสกุล
    {
        $this->first_name = $fn;
        $this->last_name = $ln;
    }

    abstract public function cal_payment(); //1.3 สร้าง abstract method ชื่อ cal_payment เพื่อคำนวณเงินที่ต้องจ่ายให้พนักงาน

    public function __toString() //1.4 สร้าง method toString 
    {
        return "<br><b>First Name: </b>$this->first_name<br><b>Last Name: </b>$this->last_name";
    }

}

class Permanent_Employee extends Employee { //2. สร้างคลาส พนักงานประจำ ที่สืบทอดมาจากคลาส Employee ในข้อ 1

    private $salary; //2.1 เพิ่ม property เป็นแบบที่ไม่สามารถเรียกใช้ได้จากภายนอกคลาส คือ salary เงินเดือน

    public function __construct($fn,$ln,$sa) //2.2 สร้าง constructor ที่สืบทอดมาจากคลาสแม่ โดยเพิ่มการรับค่าเงินเดือน
    {
        parent::__construct($fn,$ln);
        $this->salary = $sa;
    }
    public function cal_payment() //2.3 สร้างเมธอดเพื่อ overide เมธอด  cal_payment   โดยคำนวณจาก salary - (ภาษีร้อยละ 3 ของเงินเดือน)
    {
        $tax = ($this->salary)-($this->salary*0.03);
        echo "<b>Salary (Tax Calc): </b>$tax<br>";
    }
    public function __toString()
    {
        return parent::__toString()."<br><b>Salary: </b>$this->salary<br>"; //2.4 สร้าง method toString โดยสืบทอดมาจากคลาสแม่ พร้อมแสดงผลข้อมูลที่เกี่ยวข้อง
    }

}

$person_1 = new Permanent_Employee("Seksun","Hlamwanna",15000); //2.5 สร้าง object และแสดงผล
echo $person_1;
$person_1->cal_payment();

echo "<hr>";

class Daily_Employee extends Employee { // 3. สร้างคลาส พนักงานรายวัน ที่สืบทอดมาจากคลาส Employee ในข้อ 1
    
    private $wage; // 3.1 เพิ่ม property เป็นแบบที่ไม่สามารถเรียกใช้ได้จากภายนอกคลาส คือ wage ค่าจ้างรายวัน และ days จำนวนวันที่ทำงาน
    private $days;

    public function __construct($fn,$ln,$w,$d) // 3.2 สร้าง constructor ที่สืบทอดมาจากคลาสแม่ โดยเพิ่มการรับค่าจ้างรายวัน และจำนวนวันที่ทำงาน
    {
        parent::__construct($fn,$ln);
        $this->wage = $w;
        $this->days = $d;
    }

    public function cal_payment() // 3.3 สร้างเมธอดเพื่อ overide เมธอด   cal_payment   โดยคำนวณจาก ค่าจ้างรายวัน * จำนวนวันที่ทำงาน
    {
        $total = $this->wage*$this->days;
        echo "<br><b>Earnings: </b>$total";
    }

    public function __toString() // 3.4 สร้าง method toString โดยสืบทอดมาจากคลาสแม่ พร้อมแสดงผลข้อมูลที่เกี่ยวข้อง
    {
        return parent::__toString()."<br><b>Wage: </b>$this->wage<br><b>Day: </b>$this->days";
    }

}

$person_2 = new Daily_Employee("Bantita","Saeko",350,5); // 3.5 สร้าง object และแสดงผล
echo $person_2;
$person_2->cal_payment();

?>