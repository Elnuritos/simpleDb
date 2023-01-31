<?php

namespace Reworker\Entities;

use Reworker\Abstracts\Entity;
use Reworker\Interfaces\EntityInterface;
use Reworker\Interfaces\LibraryInterface;
use Reworker\Traits\MovementsTrait;


class Movements extends Entity implements EntityInterface
{
    use MovementsTrait;

    const PATH = "storage/movements/acceptance";

    public function __construct(private LibraryInterface $reworker){}
}