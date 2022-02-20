<?php
#Базовый класс для продукта
abstract class Product {
    protected $type_str; #название типа
    protected $measure; #мера измерения
    public $count; #количество

    public function getTypeStr(){
        return $this->type_str;
    }

    public function getMeasure(){
        return $this->measure;
    }
}

#Класс продукта "Молоко"
class Milk extends Product {
    function __construct(){
        $this->type_str = "Молоко";
        $this->measure = "л.";
    }
}

#Класс продукта "Яйцо"
class Egg extends Product {
    function __construct(){
        $this->type_str = "Яйцо";
        $this->measure = "шт.";
    }
}