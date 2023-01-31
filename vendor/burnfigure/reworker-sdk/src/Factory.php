<?php

namespace Reworker;



use Reworker\Entities\Movements;
use Reworker\Entities\Orders;
use Reworker\Entities\Products;
use Reworker\Library\Reworker;

class Factory
{
    const ENTITIES = [
        'orders' => Orders::class,
        'products' => Products::class,
        'movements' => Movements::class
    ];

    private static function initReworker(string $login, string $password): Reworker
    {
        $http = new \GuzzleHttp\Client([
            'base_uri' => "https://rw.orderadmin.ru/api/",
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);

        $reworker = new Reworker($http);
        $reworker->setAuth($login, $password);
        return $reworker;
    }

    public static function init(string $login, string $password, ?array $entities = null): Client
    {
        $reworker = self::initReworker($login, $password);
        $client = new Client();
        $init_list = is_null($entities) ? array_keys(self::ENTITIES) : $entities;

        foreach ($init_list as $entity){
            $class = self::ENTITIES[$entity];
            $client->$entity = new $class($reworker);
        }

        return $client;
    }
}