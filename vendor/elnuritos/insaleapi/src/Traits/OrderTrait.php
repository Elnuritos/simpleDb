<?php

namespace Insales\Traits;

use Insales\Abstracts\Entity;
use Insales\library\Insales;

trait OrderTrait
{

    /**
     * Создание заказа
     * В случае успешного создания заказа возвращает ассоциативный массив созданного заказа
     * В случае неудачи выйдет соответствующее исключение
     * @param array $order Массив заказа в соответствии с документацией
     * @return \Insales\Abstracts\Entity Ответ от сервера
     */
    public function createOrder(array $order): Entity
    {

        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_ORDERS),
            $order
        );
    }

    /**
     * Редактирование заказа
     * @param int $id
     * @param array $order
     * @return \Insales\Abstracts\Entity
     */
    public function editOrder(int $id, array $order): Entity
    {

        return $this->client->executeUpdateRequest($this->generateUrl(self::API_URL_ORDERS, $id), $order);
    }

    /**
     * Получение списка заказов
     * @param array $params Доступные параметры запроса
     * @return \Insales\Abstracts\Entity
     */
    public function getOrders(array $params = array()): Entity
    {

        return $this->client->executeListRequest($this->generateUrl(self::API_URL_ORDERS), $params);
    }

    /**
     *  Получение заказа
     * @param string|integer $id Идентификатор заказа
     * @return \Insales\Abstracts\Entity
     */
    public function getOrderById(int $id): Entity
    {

        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $id
        );
    }

    /**
     * Получает количество заказов
     * @return \Insales\Abstracts\Entity Количество заказов
     */
    public function getOrdersCount(): Entity
    {

        $response = $this->request(
            $this::METHOD_GET,
            self::API_URL . self::API_URL_ORDERS . '/count.json'
        );
        return $response;
    }

    /**
     * Удаление заказа по идентификатору
     * @param int $id Идентификатор заказа
     * @return \Insales\Abstracts\Entity
     */
    public function removeOrder(int $id): Entity
    {

        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $id
        );
    }

    public function updateOrder(int $id, array $data): Entity
    {

        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $data
        );
    }
    /**
     * Создание корзины заказа по идентификатору
     * @param int $id Идентификатор заказа
     * @param array $data Параметры
     * @return \Insales\Abstracts\Entity
     */
    public function createOrderLineByProduct(int $id, array $data): Entity
    {

        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $data
        );
    }
    /**
     * Удаление корзины заказа по идентификатору
     * @param int $id Идентификатор заказа
     * @param array $data Параметры
     * @return \Insales\Abstracts\Entity
     */
    public function removeOrderLine(int $id, array $data): Entity
    {

        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $data
        );
    }
    /**
     * Обновление статуса заказа по идентификатору
     * @param int $id Идентификатор заказа
     * @param array $data Параметры
     * @return \Insales\Abstracts\Entity
     */
    public function UpdateCustomStatus(int $id, array $data): Entity
    {

        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $data
        );
    }
}
