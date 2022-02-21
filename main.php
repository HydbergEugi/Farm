<?php

require 'vendor/autoload.php';

$farm = new \Farm\System\Farm();

for ($i = 0; $i < 10; $i++){
    $farm->addAnimal(new \Farm\Animals\Cow());
}
for ($i = 0; $i < 20; $i++){
    $farm->addAnimal(new \Farm\Animals\Chicken());
}

$farm->displayStall();

$products = $farm->collectProducts(7);
$farm->displayProducts($products);

$farm->addAnimal(new \Farm\Animals\Cow());
for($i = 0; $i < 5; $i++){
    $farm->addAnimal(new \Farm\Animals\Chicken());
}

$farm->displayStall();

$products = $farm->collectProducts(7);
$farm->displayProducts($products);

echo "ОБЩЕЕ КОЛИЧЕСТВО ПРОДУКЦИИ\n";
$farm->displayProducts();



