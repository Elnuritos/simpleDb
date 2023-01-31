<?php

namespace Reworker\Library;

use GuzzleHttp\Client;
use Reworker\Interfaces\LibraryInterface;

class Reworker implements LibraryInterface
{
    private array $auth;

    public function __construct(private Client $http){}

    public function setAuth(string $login, string $password): void
    {
        $this->auth = [
            $login,
            $password
        ];
    }

    public function get($path)
    {
        $result = $this->http->request("GET", $path, [
            'auth' => $this->auth
        ])->getBody();

        return json_decode($result, true);
    }

    public function post(string $path, array $data, $is_patch_request = false)
    {
        $method = $is_patch_request === true ? "PATCH" : "POST";

        $result = $this->http->request($method, $path, [
            'auth' => $this->auth,
            'json' => $data
        ])->getBody();

        return json_decode($result, true);
    }

}