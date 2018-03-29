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

class Page extends PageType
{
    protected $attributes = [
        'name' => 'Page',
        'description' => 'Just a very simple page, nothing fancy.',
    ];
}
