<?php

namespace Insales\Entities;

use Insales\Abstracts\Entity;
use Insales\Interfaces\EntityInterface;
use Insales\Library\Insales;
use Insales\Traits\OrderTrait;

class Order extends Entity implements EntityInterface
{
    use OrderTrait;

    public function __construct(private Insales $insales){}
}