<?php

namespace Ozon\Traits;

use Ozon\Abstracts\Entity;
use Ozon\library\Ozon;

/**
 * Trait Product Часть API-клиента, отвечающая за товары
 * @package Ozon\Traits
 * @mixin \Ozon\Abstracts\Entity
 */
trait ProductTrait
{
    /**
     * Создание товара
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function createProduct(array $product,$headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::CREATE_PRODUCT),
            $product,
            $headers
        );
    }
    /**
     * Создание товара (SKU_ID)
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function createProduct_with_id(array $product,$headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::CREATE_PRODUCT_WITH_ID),
            $product,
            $headers
        );
    }
    /**
     * Список товаров
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function getProductList(array $product,$headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::GET_PRODUCT_LIST),
            $product,
            $headers
        );
    }
    /**
     * Информация о товарах
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function getProductInfo(array $product,$headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::GET_PRODUCT_INFO),
            $product,
            $headers
        );
    }

}
