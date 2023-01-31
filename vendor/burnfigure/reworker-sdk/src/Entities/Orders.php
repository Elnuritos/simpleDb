<?php

namespace Reworker\Entities;

use Reworker\Abstracts\Entity;
use Reworker\Interfaces\EntityInterface;
use Reworker\Interfaces\LibraryInterface;
use Reworker\Traits\OrdersTrait;

class Orders extends Entity implements EntityInterface
{
    use OrdersTrait;

    const PATH = "products/order";

    public function __construct(private LibraryInterface $reworker){}

}