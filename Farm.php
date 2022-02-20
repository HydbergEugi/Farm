<?php
include "Animal.php";

#Класс "Ферма"
class Farm {
    public $stall = array(); #стойло животных
    private $animal_type_sheet = array(); #список типов животных на ферме
    private $product_type_sheet = array(); #список типов продукции на ферме
    private $products = array(); #полученные продукты

    #Функция регистрации типов животных на ферме
    public function registerAnimalType(Animal $animal_type){
        $this->animal_type_sheet[] = $animal_type->getTypeStr();
    }

    #Функция регистрации типов продуктов на ферме
    public function registerProductType(Product $product_type){
        $this->product_type_sheet[] = $product_type->getTypeStr();
        #после регистрации выделяем ячейку для хранения полученных продуктов данного типа
        $this->products[$product_type->getTypeStr()] = $product_type;
    }

    #Добавление животных на ферму
    public function addAnimal(Animal $animal){
        $animalIsRecorded = false;
        foreach ($this->animal_type_sheet as $animalType){
            if ($animal->getTypeStr() == $animalType){
                $animalIsRecorded = true;
            }
        }

        if ($animalIsRecorded){
            $id = count($this->stall);
            $this->stall[$id] = $animal;
        }
        else{
            echo "Не удалось добавить животное на ферму. Тип ".$animal->getTypeStr()." не зарегистрирован\n";
        }
    }

    #Сбор продукции со всех животных на ферме
    public function collect_products(){
        foreach ($this->stall as $id => $animal) {
            $product = $animal->giveProducts();
            $this->products[$product->getTypeStr()]->count += $product->count;
        }
    }

    #Отображение собранных продуктов
    public function displayCollectedProducts(){
        echo "Виды собранной продукции и ее количество:\n";
        foreach ($this->products as $productType => $product) {
            echo "$productType - $product->count ".$product->getMeasure()." ";
        }
        echo "\n========================================================\n\n";
    }

    #Отображение животных в стойле
    public function displayStall(){
        echo "Виды животных и их количество:\n";
        foreach ($this->animal_type_sheet as $animalType){
            $typeCount = 0;
            foreach ($this->stall as $id => $animal){
                if ($animal->getTypeStr() == $animalType){
                    $typeCount++;
                }
            }
            echo "$animalType - $typeCount ";
        }
        echo "\n========================================================\n\n";
    }

    #Симуляция работы системы
    #displayStep - задает период, за который собираются продукты
    public function simulate($displayStep = 7){
        for($i = 0; $i < 10; $i++){
            $this->addAnimal(new Cow());
        }
        for($i = 0; $i < 20; $i++){
            $this->addAnimal(new Chicken());
        }
        $this->displayStall();
        for ($i = 0; $i < $displayStep; $i++){
            $this->collect_products();
        }
        $this->displayCollectedProducts();
        $this->addAnimal(new Cow());
        for($i = 0; $i < 5; $i++){
            $this->addAnimal(new Chicken());
        }
        $this->displayStall();
        for ($i = 0; $i < $displayStep; $i++){
            $this->collect_products();
        }
        $this->displayCollectedProducts();
    }
}