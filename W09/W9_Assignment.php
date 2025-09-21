<!-- 

- คำนวณโบนัสจากเงินเดือน โดยถ้าเป็นพนักงานทั่วไปได้โบนัส 1 เดือน พนักงานขาย ได้โบนัส 3 เดือน และผู้บริหารได้โบนัส 4 เดือน
9. แสดงโบนัสของ object ในข้อ 5 - 7 -->
<?php

trait CalcSalary { //1. สร้าง Trait ซึ่งมี method ดังนี้
    public function calcSS($salary) { //คำนวณประกันสังคม โดยคิดเป็น 5% ของเงินเดือน ทั้งนี้ ไม่เกิน 750 บาท
        $ss = $salary * 0.05;
        return ($ss > 750) ? 750 : $ss;
    }
}

class Employee { //2. สร้าง Class พนักงาน ซึ่งมี property ประกอบด้วย ชื่อพนักงาน และเงินเดือน และมี method ดังนี้
    use CalcSalary;
    public $name;
    public $salary;

    public function __construct($n, $ss) { //__construct
        $this->name = $n;
        $this->salary = $ss;
    }

    public function dispIncome() { //dispIncome แสดงผล ชื่อพนักงาน เงินเดือนที่ได้รับ ประกันสังคม และรายได้ที่หักประกันสังคม
        $ss = $this->calcSS($this->salary);
        $netIncome = $this->salary - $ss;
        echo "<hr><b>ชื่อพนักงาน:</b> $this->name<br>";
        echo "<b>เงินเดือน:</b> $this->salary <br>";
        echo "<b>ประกันสังคม:</b> $ss <br>";
        echo "<b>รายได้สุทธิ:</b> $netIncome <br>";
    }
}

class Sales extends Employee { //3. สร้างคลาส พนักงานขาย ซึ่งเป็นคลาสลูกของพนักงาน ซึ่งมี property เพิ่มจากคลาสแม่ คือ ค่าเดินทาง และ คอมมิชชั่นจากการขาย
    public $travelAllowance;
    public $commission;

    public function __construct($n, $ss, $ta, $com) { //__construct
        parent::__construct($n, $ss);
        $this->travelAllowance = $ta;
        $this->commission = $com;
    }

    public function dispIncome() { //dispIncome แสดงผล ชื่อพนักงาน เงินเดือนที่ได้รับ ค่าเดินทาง และคอมมิชชั่นจากการขาย ประกันสังคม และรายได้ทั้งหมดที่หักประกันสังคม
        $ss = $this->calcSS($this->salary);
        $totalIncome = $this->salary + $this->travelAllowance + $this->commission;
        $netIncome = $totalIncome - $ss;
        echo "<hr><b>ชื่อพนักงาน:</b> $this->name<br>";
        echo "<b>เงินเดือน:</b> $this->salary <br>";
        echo "<b>ค่าเดินทาง:</b> $this->travelAllowance <br>";
        echo "<b>คอมมิชชั่น:</b> $this->commission <br>";
        echo "<b>ประกันสังคม:</b> $ss <br>";
        echo "<b>รายได้สุทธิ:</b> $netIncome <br>";
    }
}

class Executive extends Employee { //4 . สร้างคลาส ผู้บริหาร ซึ่งเป็นคลาสลูกของพนักงาน ซึ่งมี property เพิ่มขึ้น คือ ค่าตอบแทนตำแหน่งบริหาร 
    public $positionAllowance;

    public function __construct($n, $ss, $pa) { //__construct
        parent::__construct($n, $ss);
        $this->positionAllowance = $pa;
    }

    public function dispIncome() { //dispIncome แสดงผล ชื่อพนักงาน เงินเดือนที่ได้รับ ค่าตอบแทนตำแหน่งบริหาร  ประกันสังคม และรายได้ทั้งหมดที่หักประกันสังคม
        $ss = $this->calcSS($this->salary);
        $totalIncome = $this->salary + $this->positionAllowance;
        $netIncome = $totalIncome - $ss;
        echo "<hr><b>ชื่อพนักงาน:</b> $this->name<br>";
        echo "<b>เงินเดือน:</b> $this->salary <br>";
        echo "<b>ค่าตอบแทนตำแหน่งบริหาร:</b> $this->positionAllowance <br>";
        echo "<b>ประกันสังคม:</b> $ss <br>";
        echo "<b>รายได้สุทธิ:</b> $netIncome <br>";
    }
}

$emp1 = new Employee("สมชาย ใจดี", 12000); //5. สร้าง object พนักงานทั่วไปซึ่งเป็น object ของคลาสพนักงาน และ เรียกใช้ dispIncome
$emp1->dispIncome();
$emp2 = new Sales("สมหญิง ขายดี", 25000, 3000, 5000); //6. สร้าง object พนักงานขายซึ่งเป็น object ของคลาสพนักงานขาย และ เรียกใช้ dispIncome
$emp2->dispIncome();
$emp3 = new Executive("สมศักดิ์ บริหาร", 30000, 5000); //7. สร้าง object ผู้บริหารซึ่งเป็น object ของคลาสผู้บริหาร และ เรียกใช้ dispIncome
$emp3->dispIncome();


trait CalcBonus { //8. สร้าง Trait ซึ่งมี method ดังนี้
    public function calcBonus($type, $salary) { //- คำนวณโบนัสจากเงินเดือน โดยถ้าเป็นพนักงานทั่วไปได้โบนัส 1 เดือน พนักงานขาย ได้โบนัส 3 เดือน และผู้บริหารได้โบนัส 4 เดือน
        switch ($type) {
            case 'Employee':
                return $salary * 1;
            case 'Sales':
                return $salary * 3;
            case 'Executive':
                return $salary * 4;
            default:
                return 0;
        }
    }
}

class EmployeeWithBonus extends Employee {
    use CalcBonus;

    public function displayBonus() {
        $bonus = $this->calcBonus('Employee', $this->salary);
        echo "<b>โบนัสพนักงานทั่วไป:</b> $bonus <br>";
    }
}

class SalesWithBonus extends Sales {
    use CalcBonus;

    public function displayBonus() {
        $bonus = $this->calcBonus('Sales', $this->salary);
        echo "<b>โบนัสพนักงานขาย:</b> $bonus <br>";
    }
}

class ExecutiveWithBonus extends Executive {
    use CalcBonus;

    public function displayBonus() {
        $bonus = $this->calcBonus('Executive', $this->salary);
        echo "<b>โบนัสผู้บริหาร:</b> $bonus <br>";
    }
}

$emp1b = new EmployeeWithBonus("บัณฑิตา แซ่โก้", 20000);
$emp1b->dispIncome();
$emp1b->displayBonus();

$emp2b = new SalesWithBonus("เสกสรรญ หลำวรรณะ", 25000, 3000, 5000);
$emp2b->dispIncome();
$emp2b->displayBonus();

$emp3b = new ExecutiveWithBonus("สมหมาย งานดี", 30000, 5000);
$emp3b->dispIncome();
$emp3b->displayBonus();
?>