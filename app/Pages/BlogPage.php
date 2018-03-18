<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class BlogPage extends PageType
{
    protected $attributes = [
        'id' => 1,
        'name' => 'Blog article',
        'description' => 'Just a very simple Blog page, nothing fancy.',
        'machine_name' => 'blog_page'
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
