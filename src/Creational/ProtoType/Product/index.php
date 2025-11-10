<?php

use Creational\ProtoType\Product\Product;
use Creational\ProtoType\Product\PrototypeRegistry;

require_once 'vendor/autoload.php';

$register = new PrototypeRegistry();
$register->register('iphone 17', new Product(
    name: 'iphone 17',
    price: 999.99,
    attributes: [
        'color' => 'black',
        'storage' => '256GB',
        'camera' => '12MP',
    ]
));

$register->register('samsung galaxy s30', new Product(
    name: 'samsung galaxy s30',
    price: 899.99,
    attributes: [
        'color' => 'white',
        'storage' => '128GB',
        'camera' => '108MP',
    ]
));

/** @var Product $newIphone */
$newIphone = $register->get('iphone 17');
$newIphone->attributes['storage'] = '512GB';

echo json_encode($newIphone, JSON_PRETTY_PRINT);
echo json_encode($register->get('samsung galaxy s30'), JSON_PRETTY_PRINT);

$product1 = new Product(
    name: 'samsung galaxy s30',
    price: 899.99,
    attributes: [
        'color' => 'white',
        'storage' => '128GB',
        'camera' => '108MP',
    ]
);

$product2 = $product1->clone();
$product2->attributes['storage'] = '256GB';
echo json_encode($product1, JSON_PRETTY_PRINT);
echo json_encode($product2, JSON_PRETTY_PRINT);