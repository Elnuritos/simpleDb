<?php

namespace Insales\Traits;

use Insales\library\Insales;
use Insales\Abstracts\Entity;

/**
 * Trait ProductField Часть API-клиента, отвечающая за поля товаров
 * @package Insales\Traits
 * @mixin \Insales\Abstracts\Entity
 */
trait ProductFieldTrait
{
    /**
     * Создание поля товара
     * @param array $data
     * @return Entity
     */
    public function createProductField(array $data) : Entity
    {
         
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD),
            $data
        );
    }

    /**
     * Удалить поле товара
     * @param int $id
     * @return Entity
     */
    public function removeProductField(int $id) : Entity
    {
         
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $id
        );
    }

    /**
     * Получение поля товара
     * @param int $id
     * @return Entity
     */
    public function getProductField(int $id) : Entity
    {
         
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $id
        );
    }

    /**
     * Получение списка полей товара
     * @return Entity
     */
    public function getProductFields() : Entity
    {
         
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD)
        );
    }

    /**
     * Обновление поля товара
     * @param int $id
     * @param array $data
     * @return Entity
     */
    public function updateProductField(int $id, array $data) : Entity
    {
         
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $data
        );
    }
}
