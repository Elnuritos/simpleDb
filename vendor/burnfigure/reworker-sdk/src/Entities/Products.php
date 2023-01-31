<?php

namespace Reworker\Entities;

use Reworker\Abstracts\Entity;
use Reworker\Interfaces\EntityInterface;
use Reworker\Interfaces\LibraryInterface;
use Reworker\Traits\ProductsTrait;

class Products extends Entity implements EntityInterface
{
    use ProductsTrait;

    const PATH = "products/offer";

    public function __construct(private LibraryInterface $reworker){}
}