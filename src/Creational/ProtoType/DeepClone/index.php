<?php

use Creational\ProtoType\DeepClone\Category;
use Creational\ProtoType\DeepClone\Product;

require_once 'vendor/autoload.php';

$category = new Category(
    name: 'Phones',
    description: 'Mobile phones',
    tags: ['electronics', 'mobile', 'gadgets'],
);

$product1 = new Product(
    name: 'iphone 17',
    price: 999.99,
    category: $category,
);

/**
 * @var Product $product2
 */
$product2 = $product1->deepClone();
$product2->category->name = 'Smartphones';
$product2->category->description = 'Mobile phones with advanced features';
$product2->category->tags[] = 'apple';

echo "original category:\n";
print_r($product1->category);

echo "\ncloned category:\n";
print_r($product2->category);