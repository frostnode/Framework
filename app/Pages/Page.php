<?php

namespace App\Pages;

use Modules\Page\Entities\PageType;

class Page extends PageType
{
    protected $attributes = [
        'name' => 'Page',
        'description' => 'Just a very simple page, nothing fancy.'
    ];
}
