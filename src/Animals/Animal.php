<?php

namespace Farm\Animals;


#Базовый класс животного
abstract class Animal
{
    protected $type_str; #Название типа

    public function getTypeStr()
    {
        return $this->type_str;
    }

    public abstract function giveProducts(); #Получение продукции
}
