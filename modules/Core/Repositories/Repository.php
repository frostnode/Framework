<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoryInterface;

class Repository implements RepositoryInterface
{

    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentTask constructor.
     *
     * @param App\Task $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all tasks.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get task by id.
     *
     * @param integer $id
     *
     * @return App\Task
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create a new task.
     *
     * @param array $attributes
     *
     * @return App\Task
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a task.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return App\Task
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a task.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
