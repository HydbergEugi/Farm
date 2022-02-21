<?php

#Базовый класс для продукта
namespace Farm\Products;

abstract class Product
{
    protected $type_str; #название типа
    protected $measure; #мера измерения
    public $count; #количество

    public function getTypeStr()
    {
        return $this->type_str;
    }

    public function getMeasure()
    {
        return $this->measure;
    }
}

