<?php

namespace Ozon\Entities;

use Ozon\Abstracts\Entity;
use Ozon\Interfaces\EntityInterface;
use Ozon\Library\Ozon;
use Ozon\Traits\FbsTrait;

class Fbs extends Entity implements EntityInterface
{
    use FbsTrait;

    public function __construct(private Ozon $Ozon){}
}