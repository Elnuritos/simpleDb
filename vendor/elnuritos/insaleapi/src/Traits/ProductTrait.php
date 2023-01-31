<?php

namespace Insales\Traits;

use Insales\library\Insales;
use Insales\Abstracts\Entity;

/**
 * Trait Product Часть API-клиента, отвечающая за товары
 * @package InSales\Traits
 * @mixin \Insales\Abstracts\Entity
 */
trait ProductTrait {
    /**
     * Создание товара
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Insales\Abstracts\Entity
     */
    public function createProduct(array $product) {
        
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PRODUCTS),
            $product
        );
    }

    /**
     * Получение товаров
     * @param array $params Параметры запроса
     * @return \Insales\Abstracts\Entity
     */
    public function getProducts($params = []) {
           
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_PRODUCTS),
            $params
        );
    }

    /**
     * Получение товара по идентификатору
     * @param $id
     * @return \Insales\Abstracts\Entity
     */
    public function getProductById($id) {
        
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $id
        );
    }

    /**
     * Удаление товара по идентификатору
     * @param $id string|integer Идентификатор товара
     * @return \Insales\Abstracts\Entity Результат удаления
     */
    public function removeProduct($id) {
        
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $id
        );
    }

    /**
     * Обновление товара
     * @param int $id
     * @param array $data
     * @return Entity
     */
    public function updateProduct(int $id, array $data) : Entity
    {
        
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $data
        );
    }

    /**
     * Обновление товара
     * @param int $id
     * @param array $data
     * @return Entity
     */
    public function updateProductBundle(array $data) : Entity
    {
        
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, 4),
            $data
        );
    }

    /**
     * Получение количества товаров
     * @return \Insales\Abstracts\Entity
     */
    public function getProductsCount() {
        
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PRODUCTS_COUNT),
            null
        );
    }
}