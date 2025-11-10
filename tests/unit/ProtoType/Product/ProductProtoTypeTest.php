<?php

namespace Tests\Unit\ProtoType\Product;

use Creational\ProtoType\Product\Product;
use Creational\ProtoType\Product\PrototypeRegistry;
use Error;
use PHPUnit\Framework\TestCase;

class ProductProtoTypeTest extends TestCase
{
    public function test_it_can_create_products_with_clone(): void
    {
        $standardProduct = new Product(
            name: 'prodcut1',
            price: 1000,
            attributes: [
                'color' => 'black',
                'storage' => '256GB',
                'camera' => '12MP',
        ]);

        for ($i = 0; $i < 5; $i++) {
            $clonedCar = clone $standardProduct;     

            $this->assertInstanceOf(Product::class, $clonedCar);
        }
    }

    public function test_can_register_and_clone_product(): void
    {
        $registry = new PrototypeRegistry();

        $originalProduct = new Product(name: 'iPhone 15', price: 40000, attributes: ['color' => 'black']);
        $registry->register('iphone', $originalProduct);

        $clonedProduct = $registry->get('iphone');

        /** 
         * @var Product $clonedProduct 
         */
        // assert cloned values
        $this->assertSame('iPhone 15', $clonedProduct->name);
        $this->assertSame(40000.0, $clonedProduct->price);
        $this->assertSame(['color' => 'black'], $clonedProduct->attributes);

        // in the memory not the same instance
        $this->assertNotSame($originalProduct, $clonedProduct);
    }

    public function test_cloned_product_can_be_modified_independently(): void
    {
        $registry = new PrototypeRegistry();
        $registry->register('iphone', new Product(
                name: 'iPhone 15',
                price: 40000,
                attributes: ['color' => 'black']
            )
        );

        $product1 = $registry->get('iphone');
        $product2 = $registry->get('iphone');

        /** 
         * @var Product $product2 
         * @var Product $product1 
         */
        $product2->attributes['color'] = 'red';

        $this->assertSame('black', $product1->attributes['color']);
        $this->assertSame('red', $product2->attributes['color']);
    }

    public function test_it_can_create_products_with_registry(): void
    {
        $standardProduct = new PrototypeRegistry();
        $standardProduct->register('prodcut1', new Product(
                name: 'prodcut1',
                price: 1000,
                attributes: [
                    'color' => 'black',
                    'storage' => '256GB',
                    'camera' => '12MP',
                ]
            )
        );

        for ($i = 0; $i < 5; $i++) {
            $clonedCar = $standardProduct->get('prodcut1');
            $this->assertInstanceOf(Product::class, $clonedCar);
        }
    }

    public function test_exception_if_unregistered_key_requested(): void
    {
        $this->expectException(Error::class);

        $registry = new PrototypeRegistry();
        $registry->get('not_found');
    }

}