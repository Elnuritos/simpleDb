<?php

namespace Ozon\Entities;

use Ozon\Abstracts\Entity;
use Ozon\Interfaces\EntityInterface;
use Ozon\Library\Ozon;
use Ozon\Traits\ProductTrait;

class Product extends Entity implements EntityInterface
{
    use ProductTrait;

    public function __construct(private Ozon $Ozon){}
}