<?php

namespace App\Contracts;


interface BaseContract
{
    public function fill(array $data): static;

    public function save(): bool;

    public function create(array $data);
}
