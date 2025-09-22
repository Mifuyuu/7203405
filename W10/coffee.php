<?php

class Coffee {
    private $cost;
    private $description;
    private $db;

    public function __construct($db, $name){
        $this->db = $db;
        $this->loadFromDB($name);
    }
    public function loadFromDB($name){
        $data = $this->db->query("SELECT cost, description FROM beverages WHERE name = ?", [$name]);
        if(!empty($data)){
            $this->cost = $data[0]['cost'];
            $this->description = $data[0]['description'];
        }else{
            $this->cost = 0;
            $this->description = 'ไม่พบรายการสินค้า';
        }
    }

    public function getCost(){
        return $this->cost;
    }

    public function getDescription(){
        return $this->description;
    }
}

?>