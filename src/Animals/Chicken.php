<?php

#Класс "Курица"
namespace Farm\Animals;

use Farm\Products\Egg;

class Chicken extends Animal
{

    function __construct()
    {
        $this->type_str = "Курица";
    }

    public function giveProducts()
    {
        $egg = new Egg();
        $egg->count = rand(0, 1);
        return $egg;
    }
}