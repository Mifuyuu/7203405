<?php 
require_once 'dbmanager.php';
require_once 'coffee.php';

$db_config = [
    'host' => 'localhost',
    'dbname' => 'coffeeshop',
    'user' => 'root',
    'pass' => ''
];

$db = new DatabaseManager($db_config['host'], $db_config['dbname'], $db_config['user'],$db_config['pass']);

echo "<h1>ร้านกาแฟออนไลน์</h1>";

$order1 = new Coffee($db, "Latte");
echo "รายการที่สั่ง ".$order1->getDescription()."<br>";
echo "ราคา ".$order1->getCost()."<br>";

$order2 = new Coffee($db, "Espresso");
echo "รายการที่สั่ง ".$order2->getDescription()."<br>";
echo "ราคา ".$order2->getCost()."<br>";

?>