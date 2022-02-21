<?php

#Класс "Корова"
namespace Farm\Animals;

use Farm\Products\Milk;

class Cow extends Animal
{

    function __construct()
    {
        $this->type_str = "Корова";
    }

    public function giveProducts()
    {
        $milk = new Milk();
        $milk->count = rand(8, 12);
        return $milk;
    }
}