<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'machine_name',
        'description',
        'group'
    ];

    public static function listAll()
    {
        $children  = array();
        foreach(get_declared_classes() as $class){

            if($class instanceof PageType) $children[] = $class;
        }

        return 'read all from somewhere';
    }
}
