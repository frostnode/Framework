<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Page\Entities\Alias;

class Page extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'title',
        'status',
        'revision_id',
        'lang_id',
        'type_id',
        'user_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the alias(es) associated with the user.
     */
    public function alias()
    {
        return $this->hasMany('Modules\Page\Entities\Alias');
    }
}
