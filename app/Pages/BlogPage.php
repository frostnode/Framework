<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class BlogPage extends PageType
{
    public static function getInfo()
    {
        //
        return [
            'name' => "Blog page",
            'description' => "Just a very simple Blog page, nothing fancy.",
            'machine_name' => "blog_page",
        ];
    }

    public static function fields()
    {
        // Add fields here...
    }

    public static function register()
    {
        //
    }

    public static function unregister()
    {
        //
    }
}
