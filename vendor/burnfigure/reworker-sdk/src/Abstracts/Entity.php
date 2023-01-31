<?php

namespace Reworker\Abstracts;

abstract class Entity
{
    protected array $response;

    protected function runCallBack(callable $callback = null): void
    {
        if(!is_null($callback)) {
            $callback($this->response);
        }
    }

    public function getResponse(callable $callback = null): ?array
    {
        $this->runCallBack($callback);
        return $this->response ?? null;
    }

}