<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_aliases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'lang_id',
        'page_id',
        'type',
        'response'
    ];

}
