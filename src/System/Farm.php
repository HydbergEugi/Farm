<?php

namespace Farm\System;
require 'vendor/autoload.php';

#Класс "Ферма"
use Farm\Animals\Animal;

class Farm
{
    public $stall = array(); #стойло животных
    private $products = array(); #полученные продукты

    #Добавление животных на ферму
    public function addAnimal(Animal $animal)
    {
        $id = count($this->stall, COUNT_RECURSIVE);
        $this->stall[$animal->getTypeStr()][$id] = $animal;
    }

    #Сбор продукции со всех животных на ферме
    #Возвращает массив продуктов собранных за один раз
    public function collectProducts($days = 1)
    {
        $productsCurrent = array();
        #заполнение массива продуктов, собранных за этот раз
        for($i = 0; $i < $days; $i++){
            foreach ($this->stall as $animalType => $animalsOfType) {
                foreach ($animalsOfType as $id => $animal){
                    $product = $animal->giveProducts();
                    $productsCurrent[$product->getTypeStr()][] = $product;
                }
            }
        }

        #дополняем массив общей продукции текущим сбором продукции
        foreach ($productsCurrent as $productType => $products) {
            foreach ($products as $product) {
                $this->products[$product->getTypeStr()][] = $product;
            }
        }

        return $productsCurrent;
    }

    #Отображение собранных продуктов
    #В качестве параметра принимает массив продуктов с элементами типа Product
    #По умолчанию отображает общее количество продуктов на ферме
    public function displayProducts($products = null)
    {
        if ($products == null){
            $products = $this->products;
        }
        echo "Виды собранной продукции и ее количество:\n";
        foreach ($products as $productType => $productsOfType) {
            $count = 0;
            foreach ($productsOfType as $product) {
                $count += $product->count;
            }
            echo $product->getTypeStr()." - $count ".$product->getMeasure()." ";
        }
        echo "\n========================================================\n\n";
    }

    #Отображение животных в стойле
    public function displayStall()
    {
        echo "Виды животных и их количество:\n";

        foreach ($this->stall as $animalType => $animalsOfType){
            echo $animalType." - ".count($animalsOfType)."\n";
        }
        echo "========================================================\n\n";
    }

}