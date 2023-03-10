<?php

namespace UrsacoreLab\Blog\Models;

use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Traits\Validation;

class Category extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ursacorelab_blog_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'slug',
        'keywords',
        'status',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required|string|unique:ursacorelab_blog_categories',
        'slug' => 'required|string|unique:ursacorelab_blog_categories',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'name'     => 'string',
        'slug'     => 'string',
        'keywords' => 'string',
        'status'   => 'integer',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getStatusOptions(): array
    {
        return Statuses::short_list();
    }

    public $hasMany = [
        'children' => [Post::class, 'key' => 'category_id'],
    ];
}
