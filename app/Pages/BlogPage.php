<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class BlogPage extends PageType
{
    protected $attributes = [
        'name' => 'Blog article',
        'description' => 'A very simple Blog page, nothing fancy.'
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
                    'attr' => ['class' => 'help']
                ],
                'rules' => 'required',
                'error_messages' => [
                    'body.required' => 'The body field is mandatory.'
                ]
            ]
        ];
    }
}
