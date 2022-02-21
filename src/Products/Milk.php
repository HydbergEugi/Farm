<?php

#Класс продукта "Молоко"
namespace Farm\Products;

class Milk extends Product
{
    function __construct()
    {
        $this->type_str = "Молоко";
        $this->measure = "л.";
    }
}
