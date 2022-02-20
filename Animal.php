<?php
include "Products.php";

#Базовый класс животного
abstract class Animal {
    protected $type_str; #Название типа
    public function getTypeStr(){
        return $this->type_str;
    }
    public abstract function giveProducts(); #Получение продукции
}

#Класс "Корова"
class Cow extends Animal {

    function __construct(){
        $this->type_str = "Корова";
    }

    public function giveProducts()
    {
        $milk = new Milk();
        $milk->count = rand(8, 12);
        return $milk;
    }
}

#Класс "Курица"
class Chicken extends Animal {

    function __construct(){
        $this->type_str = "Курица";
    }

    public function giveProducts()
    {
        $egg = new Egg();
        $egg->count = rand(0,1);
        return $egg;
    }
}