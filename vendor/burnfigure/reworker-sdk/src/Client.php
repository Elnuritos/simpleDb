<?php

namespace Reworker;

use Reworker\Entities\Movements;
use Reworker\Entities\Orders;
use Reworker\Entities\Products;

class Client
{
    private Orders $orders;
    private Products $products;
    private Movements $movements;

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function __set(string $name, $value): void
    {
        $this->$name = $value;
    }
}