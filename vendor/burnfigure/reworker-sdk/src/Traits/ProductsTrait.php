<?php

namespace Reworker\Traits;

use Reworker\Handlers\Filters;
use Reworker\Handlers\ListMaker;

trait ProductsTrait
{

    public function addProduct(array $data, int $shop_id, callable $callback = null): ?array
    {
        $this->response = $this->reworker->post(self::PATH."/{$shop_id}", $data);
        return $this->getResponse($callback);
    }

    public function updateProduct(array $data, int $product_id, int $shop_id, callable $callback = null): ?array
    {
        $this->response = $this->reworker->post(self::PATH."/{$shop_id}/{$product_id}", $data, true);
        return $this->getResponse($callback);
    }

    public function getProductsByArticles(array $articles, callable $callback = null): ?array
    {
        $query = [
            'order-by' => [Filters::getDefaultOrderFilter()],
            'filter' => [Filters::getFieldFilter('article', $articles, 'in')]
        ];

        return $this->getProductsByQuery($query, $callback);
    }

    public function getProductsByArticle(string $article, callable $callback = null): ?array
    {
        $query = [
            'filter' => [Filters::getFieldFilter('article', $article)]
        ];

        return $this->getProductsByQuery($query, $callback);
    }

    public function getProductsByQuery(array $query, callable $callback = null): ?array
    {
        $this->response = ListMaker::getEntityList($this->reworker, $query, self::PATH);
        return $this->getResponse($callback);
    }
}