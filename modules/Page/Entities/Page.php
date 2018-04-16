<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Image\Manipulations;
use Modules\Page\Entities\Alias;

/**
 * @property int status
 * @property int lang_id
 * @property int user_id
 * @property array|null|string pagetype_model
 * @property array|null|string slug
 * @property array|null|string title
 * @property string uuid
 * @property array content
 */

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use Sluggable;
    use HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'json',
        'status' => 'integer'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'status',
        'content',
        'pagetype_model',
        'lang_id',
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
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Register all media conversion that should be made when uploading
     *
     * @todo This would be cool to have as a admin config option
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->fit(Manipulations::FIT_CROP, 320, 200)
              ->sharpen(10);
    }

    /**
     * Scope a query to only include pages of a given status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfStatus($query, $status)
    {
        // Check whether status is null or not
        if (!is_null($status)) {
            // Return with filter
            return $query->where('status', $status);
        } else {
            // Return without filter
            return $query;
        }
    }

    /**
     * Get the status name.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 1:
                $value = 'Draft';
                break;
            case 2:
                $value = 'Published';
                break;
            default:
                $value = 'Undefined';
                break;
        }
        return $value;
    }


    /**
     * Get the alias(es) associated with the page.
     */
    public function alias()
    {
        return $this->hasMany('Modules\Page\Entities\Alias');
    }

    /**
     * Get the pagetype associated with the page.
     */
    public function pagetype()
    {
        return $this->hasOne('Modules\Page\Entities\PageType', 'model', 'pagetype_model');
    }
}
