<?php

namespace Modules\Page\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class FileType extends FormField
{

    /**
     * @inheritdoc
     */
    protected function getTemplate()
    {
        return 'page::fields.filetype';
    }
}
