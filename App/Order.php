<?php

namespace App;

class Order
{
    private $price;
    private $user;

    public function __construct(string $price, User $user)
    {
        $this->price = $this->getFormattedPrice($price);
        $this->user = $user;
    }

    public function __toString(): string
    {
        $name = $this->user->getName();
        return sprintf(
            '%s made an order for %s.',
            $name,
            $this->price
        );
    }

    private function getFormattedPrice(string $price): string
    {
        if (3 === random_int(1,5)) {
            throw new \RuntimeException('*flips table* I\'m out. Peace.');
        }
        return '$'.number_format($price, 2);
    }
}
