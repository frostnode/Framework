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

    public function __constructor()
    {
        //
        dd('fuuuu');
    }

    public static function listAll()
    {
        $page_types = config('page.pagetypes');

        $types = collect();
        foreach ($page_types as $key => $page_type) {
            $func = "$page_type::getInfo";
            $types->put($key, PageType::make($func())); // PHP 7.0.0+; prior, it raised a fatal error
        }

        return $types;
    }
}
