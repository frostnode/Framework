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
            [
                'name' => 'title',
                'type' => 'text',
                'label_show' => false,
                'attr' => [
                    'class' => 'input is-large',
                    'placeholder' => 'Page title'
                ],
                'rules' => 'required|min:3',
                'error_messages' => [
                    'title.required' => 'The title field is mandatory.'
                ]
            ],
            [
                'name' => 'slug',
                'type' => 'text',
                'label_show' => false,
                'attr' => [
                    'class' => 'input is-small',
                    'disabled' => 'true',
                    'placeholder' => 'Page alias will be generated automaticly'
                ],
                'rules' => 'required|min:2',
                'error_messages' => [
                    'slug.required' => 'The alias field is mandatory.'
                ]
            ]
        ];
    }

    public function getDefaultFields()
    {
        return $this->setDefaultFields();
    }
}
