<?php

namespace Ozon\Traits;

use Ozon\Abstracts\Entity;
use Ozon\library\Ozon;

/**
 * Trait fbs Часть API-клиента, отвечающая за FBS
 * @package Ozon\Traits
 * @mixin \Ozon\Abstracts\Entity
 */
trait FbsTrait
{
    /**
     * Создание товара
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $fbs Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function getFbsList(array $fbs, $headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::GET_FBS_LIST),
            $fbs,
            $headers
        );
    }
    public function getFboList(array $fbs, $headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::GET_FBO_LIST),
            $fbs,
            $headers
        );
    }
    /**
     * Создание товара (SKU_ID)
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $fbs Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function getFbsId(array $fbs, $headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::GET_FBS_WITH_ID),
            $fbs,
            $headers
        );
    }
    /**
     * Список товаров
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $fbs Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function createFbsShip(array $fbs, $headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::CREATE_FBS_SHIP),
            $fbs,
            $headers
        );
    }
    /**
     * Информация о товарах
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $fbs Массив созданного товара
     * @return \Ozon\Abstracts\Entity
     */
    public function cancelFbsShip(array $fbs, $headers)
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::CANSEL_FBS_SHIP),
            $fbs,
            $headers
        );
    }

}
