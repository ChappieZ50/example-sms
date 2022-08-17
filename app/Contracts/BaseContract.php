<?php

namespace App\Contracts;


interface BaseContract
{
    public function fill(array $data): static;

    public function save(): bool;

    public function paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', $page = null): mixed;

    public function where($column, $operator = null, $value = null);

    public function orWhere($column, $operator = null, $value = null);
}
