<?php

namespace Reworker\Traits;

use Reworker\Handlers\Filters;
use Reworker\Handlers\ListMaker;

trait OrdersTrait
{

    public function createOrder(array $data, callable $callback = null): ?array
    {
        $this->response = $this->reworker->post(self::PATH, $data);
        return $this->getResponse($callback);
    }

    public function updateOrder(array $data, callable $callback = null): ?array
    {
        $this->response = $this->reworker->post(self::PATH, $data, true);
        return $this->getResponse($callback);
    }

    public function getOrderByID(int $order_id, callable $callback = null): ?array
    {
        $this->response = $this->reworker->get(self::PATH."/{$order_id}");
        return $this->getResponse($callback);
    }

    public function getOrderProducts(int $order_id, callable $callback = null): ?array
    {
        $filter = Filters::getFieldFilter('order', $order_id);
        $filter['alias'] = 'op';

        $query = [
            'filter' => [$filter]
        ];

        $this->response = ListMaker::getEntityList($this->reworker, $query, self::PATH."/product");
        return $this->getResponse($callback);
    }

    public function getOrdersByExtID($ext_id, callable $callback = null): ?array
    {
        $query = [
            "filter" => [Filters::getFieldFilter('extId', $ext_id)]
        ];

        return $this->getOrdersByQuery($query, $callback);
    }

    public function getOrdersByExtIDs(array $ext_ids, callable $callback = null): ?array
    {
        $query = [
            'order-by' => [Filters::getDefaultOrderFilter()],
            'filter' => [Filters::getFieldFilter('extId', $ext_ids, 'in')]
        ];

        return $this->getOrdersByQuery($query, $callback);
    }

    public function getOrdersBySource(int $source_id, callable $callback = null): ?array
    {
        $query = [
            "order-by" => [Filters::getDefaultOrderFilter()],
            'filter' => [Filters::getFieldFilter('source', $source_id)],
        ];

        return $this->getOrdersByQuery($query, $callback);
    }

    public function getOrdersByStatus(string $status, callable $callback = null): ?array
    {
        $query = [
            'filter' => [Filters::getFieldFilter('state', $status)],
        ];

        return $this->getOrdersByQuery($query, $callback);
    }


    public function getOrdersByQuery(array $query, callable $callback = null): ?array
    {
        $this->response = ListMaker::getEntityList($this->reworker, $query, self::PATH);
        return $this->getResponse($callback);
    }

}