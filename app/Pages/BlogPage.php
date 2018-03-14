<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class BlogPage extends PageType
{
    protected $title = "Blog page";

    protected $description = "Just a very simple Blog page, nothing fancy.";

    protected $machine_name = "blog_page";

    public function buildForm()
    {
        // Add fields here...
    }
}
