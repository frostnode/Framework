<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_revision';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'lang_id',
        'type_id',
        'page_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'array',
    ];

}
