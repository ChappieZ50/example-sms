<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseContract
{
    private $entity;

    /**
     * Repository constructor.
     * @param $entity
     */
    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function fill(array $data): static
    {
        $this->entity->fill($data);
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        return $this->entity->save();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->entity->create($data);
    }
}
