<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Kris\LaravelFormBuilder\FormBuilder;

class PageType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_type';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fields' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'model',
        'fields'
    ];

    /**
     * Set default fields
     */
    public function setDefaultFields()
    {
        return [
            ['title', 'text'],
            ['slug', 'text']
        ];
    }

    public function getDefaultFields()
    {
        return $this->setDefaultFields();
    }
}
