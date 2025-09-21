<?php

trait greeting {
    public function welcome(){
        echo "<h3>Welcome to NPRU</h3>";
    }
    public function goodbye(){
        echo "<h3>Goodbye, see you later.</h3>";
    }
}

class Personal{
    use greeting;
}
class Teacher{
    use greeting;
}
class Student{
    use greeting;
}

$p1 = new Personal();
$p1->welcome();
$p1->goodbye();

$p2 = new Teacher();
$p2->welcome();
$p2->goodbye();

$p3 = new Student();
$p3->welcome();
$p3->goodbye();

?>