<?php

namespace Ozon\Library;

use Ozon\Library\Client as HttpClient;
use Ozon\Traits\OrderTrait;
use Ozon\Traits\ProductFieldTrait;
use Ozon\Traits\ProductTrait;
use Ozon\Traits\FbsTrait;

class Ozon
{
    use
    ProductTrait,
    FbsTrait;

    const CREATE_PRODUCT = '/v2/product/import';
    const CREATE_PRODUCT_WITH_ID = '/v1/product/import-by-sku';
    const GET_PRODUCT_LIST = '/v2/product/list';
    const GET_PRODUCT_INFO = '/v2/product/info';

    const GET_FBS_UNFULFILLED = '/v3/posting/fbs/unfulfilled/list';
    const GET_FBS_LIST = '/v3/posting/fbs/list';
    const GET_FBO_LIST = '/v2/posting/fbo/list';
    const GET_FBS_WITH_ID = '/v3/posting/fbs/get';
    const CREATE_FBS_SHIP = '/v3/posting/fbs/ship';
    const CANSEL_FBS_SHIP = '/v2/posting/fbs/cancel';
    const API_URL="https://api-seller.ozon.ru";
  

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
            $result = self::API_URL . $url;
        } else {
            $result = self::API_URL . $url . '/' . $id;
        }
        return $result;
    }

}
