<?php

namespace Reworker\Interfaces;

interface EntityInterface
{
    public function getResponse(callable $callback = null): ?array;
}