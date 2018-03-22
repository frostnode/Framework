<?php

/*
 * Fields options
 *
 * Required
 * 'name' => 'your field name'
 * 'type' => 'text|textarea etc'
 *
 * $options = [
 *   'wrapper' => ['class' => 'form-group'],
 *   'attr' => ['class' => 'form-control'],
 *   'help_block' => [
 *       'text' => null,
 *       'tag' => 'p',
 *       'attr' => ['class' => 'help-block']
 *   ],
 *   'default_value' => null, // Fallback value if none provided by value property or model
 *   'label' => $this->name,  // Field name used
 *   'label_show' => true,
 *   'label_attr' => ['class' => 'control-label', 'for' => $this->name],
 *   'errors' => ['class' => 'text-danger'],
 *   'rules' => [],           // Validation rules
 *   'error_messages' => []   // Validation error messages
 * ]
 */

namespace App\Pages;

use Modules\Page\Entities\PageType;

class BlogPage extends PageType
{
    protected $attributes = [
        'name' => 'Blog article',
        'description' => 'A very simple Blog page, nothing fancy.',
    ];

    public function setFields()
    {
        return [
            [
                'name' => 'body',
                'type' => 'textarea',
                'label' => 'Body',
                'help_block' => [
                    'text' => 'Content, the bread and butter of any great article',
                    'tag' => 'p',
                    'attr' => ['class' => 'help'],
                ],
                'rules' => 'required',
                'error_messages' => [
                    'body.required' => 'The body field is mandatory.',
                ],
            ],
        ];
    }
}
