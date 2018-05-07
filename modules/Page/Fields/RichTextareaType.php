<?php

namespace Modules\Page\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class RichTextareaType extends FormField
{

    /**
     * @inheritdoc
     */
    protected function getTemplate()
    {
        return 'page::fields.richtextareatype';
    }
}
