<?php

include "Farm.php";

$farm = new Farm();
#Регистрация типов животных и типов продукции на ферме

#Для включения в работу новых животных и продукции достаточно описать их классы
#и зарегистрировать перед началом работы фермы
$farm->registerAnimalType(new Cow());
$farm->registerProductType(new Milk());

$farm->registerAnimalType(new Chicken());
$farm->registerProductType(new Egg());

$farm->simulate();




