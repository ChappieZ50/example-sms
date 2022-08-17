<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseContract
{
    protected $entity;

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
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param $page
     * @return mixed
     */
    public function paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', $page = null): mixed
    {
        return $this->entity->paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);
    }

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($column, $operator = null, $value = null): static
    {
        $this->entity->where($column, $operator, $value, 'and');
        return $this;
    }

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function orWhere($column, $operator = null, $value = null): static
    {
        $this->entity->orWhere($column, $operator, $value, 'or');
        return $this;
    }
}
