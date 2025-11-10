<?php

namespace Creational\ProtoType\MutalbeVsImmutableUser;

class MutableUser 
{
    public function __construct(
        public string $name,
    ) {}

    public function setName(string $name): string
    {
        return $this->name = $name;
    }
}

$mutableUser = new MutableUser("ali");
$mutableUser->setName("ali ahmed");

print_r($mutableUser->name);

class ImmutableUser 
{
    public function __construct(
        private string $name,
        private string $age,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function withName(string $name): self
    {
        return new self($name, $this->age);
    }
}

$immutableUser = new ImmutableUser('ahmed', 20);
$newImmutableUser = $immutableUser->withName('ali');

var_dump($immutableUser->getName());
var_dump($newImmutableUser->getName());

final class Money
{
    public function __construct(
        public readonly int $amount, 
        public readonly string $currency
    ) { }    
    
    public function add(Money $other): Money
    {
        if ($this->currency !== $other->currency) {
            throw new \InvalidArgumentException("Currency mismatch.");
        }        
        
        return new Money($this->amount + $other->amount, $this->currency);
    }
}

$money = new Money(100, 'Egy');
$newMoney = $money->add(new Money(200,'Egy'));

var_dump($money);
echo "\nnew money object:\n";
var_dump($newMoney);