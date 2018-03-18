<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageType extends Model
{
    protected $fields;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'json',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'machine_name',
        'description',
        'content',
        'model'
    ];

    public function __construct($fields = null)
    {
        $this->content = $this->fields;
    }

    public function getName($name)
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
