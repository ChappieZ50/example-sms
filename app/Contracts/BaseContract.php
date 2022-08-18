<?php

namespace App\Contracts;


interface BaseContract
{
    public function fill(array $data);

    public function save();

    public function find($id);

    public function paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', $page = null);

    public function where($column, $operator = null, $value = null);

    public function orWhere($column, $operator = null, $value = null);
}
