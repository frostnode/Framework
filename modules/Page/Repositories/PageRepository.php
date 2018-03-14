<?php

namespace Modules\Page\Repositories;

use Modules\Core\Repositories\RepositoryInterface;
use Modules\Page\Entities\Page;

class PageRepository implements RepositoryInterface
{

    private $model;

    /**
     * PageRepository constructor.
     *
     * @param App\Page $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * Get all pages.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get page by id.
     *
     * @param integer $id
     *
     * @return Modules\Page\Entities\Page
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get page by slug.
     *
     * @param integer $slug
     *
     * @return Modules\Page\Entities\Page
     */
    public function getBySlug($slug)
    {
        return $this->model->whereHas('alias', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    /**
     * Create a new page.
     *
     * @param array $attributes
     *
     * @return Modules\Page\Entities\Page
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a page.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Modules\Page\Entities\Page
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a page.
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
