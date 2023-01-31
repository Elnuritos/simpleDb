<?php

namespace Insales\Entities;

use Insales\Abstracts\Entity;
use Insales\Interfaces\EntityInterface;
use Insales\Library\Insales;
use Insales\Traits\ProductTrait;

class Product extends Entity implements EntityInterface
{
    use ProductTrait;

    public function __construct(private Insales $insales){}
}