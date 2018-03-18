<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class Page extends PageType
{
    protected $attributes = [
        'id' => 2,
        'name' => 'Normal page',
        'description' => 'Just a very simple page.',
        'machine_name' => 'standard_page'
    ];

    protected $fields = [
        'textarea' => [
            'name' => 'body',
            'placeholder' => 'Main body text',
            'class' => 'textarea'
        ]
    ];

    public function register()
    {
        //
    }

    public function unregister()
    {
        //
    }
}
