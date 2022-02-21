<?php


#Класс продукта "Яйцо"
namespace Farm\Products;

class Egg extends Product
{
    function __construct()
    {
        $this->type_str = "Яйцо";
        $this->measure = "шт.";
    }
}