<?php

namespace Reworker\Interfaces;

interface LibraryInterface
{
    public function get($path);
    public function post(string $path, array $data, $is_patch_request = false);
}