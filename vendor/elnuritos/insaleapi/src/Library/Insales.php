<?php

namespace Insales\Library;


use Insales\Library\Client as HttpClient;
use Insales\Traits\{
    OrderTrait,
    ProductTrait,
    ProductFieldTrait,
};


class Insales
{
    use
        OrderTrait,
        ProductTrait,
        ProductFieldTrait;



    const API_URL_ORDERS = '/admin/orders';
    const API_URL_PRODUCTS = '/admin/products';
    const API_URL_PRODUCTS_COUNT = '/admin/products/count';
    const API_URL_PRODUCT_FIELD = '/admin/product_fields';
    const API_URL_PRODUCT_FIELD_VALUE = '/admin/products/{slug}/product_field_values';
    const API_URL = "https://323f9baffa77dfd407d9ee42731e3d7a:14aab7f0d7a89a0c0aa52dd4d54fc29c@dimaestri.com";
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    private $client;
    public function __construct(string $hostName)
    {
        $this->client = new HttpClient($hostName);
    }

    public function generateUrl(string $url, $id = null): string
    {
        if ($id === null) {
            $result = self::API_URL . $url . '.json';
        } else {
            $result = self::API_URL . $url . '/' . $id . '.json';
        }
        return $result;
    }

}