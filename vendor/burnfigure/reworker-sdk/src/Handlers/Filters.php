<?php

namespace Reworker\Handlers;

class Filters
{
    public static function getDefaultOrderFilter(): array
    {
        return  [
            'type' => 'field',
            'field' => 'created',
            'direction' => 'desc'
        ];
    }

    public static function getFieldFilter(string $field_name, mixed $value, $operator = 'eq'): array
    {
        $filter = [
            'type' => $operator,
            'field' => $field_name
        ];

        $value_key = is_array($value) ? "values" : "value";
        $filter[$value_key] = $value;

        return $filter;
    }
}