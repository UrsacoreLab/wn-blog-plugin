<?php

namespace UrsacoreLab\Blog\Models;

use Illuminate\Support\Collection;
use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Traits\Validation;

class Post extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ursacorelab_blog_posts';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'category_id',
        'name',
        'keywords',
        'title',
        'introductory',
        'content',
        'slug',
        'status',
        'image',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'category_id'  => 'required|integer',
        'name'         => 'required|string|unique:ursacorelab_blog_posts',
        'keywords'     => 'string',
        'title'        => 'required|string',
        'introductory' => 'required',
        'content'      => 'required',
        'slug'         => 'required|string|unique:ursacorelab_blog_posts',
        'status'       => 'integer',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'category_id' => 'integer',
        'name'        => 'string',
        'keywords'    => 'string',
        'title'       => 'string',
        'slug'        => 'string',
        'status'      => 'integer',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $attachOne = [
        'image' => ['System\Models\File'],
    ];

    public function getCategoryIdOptions(): Collection
    {
        $categories = Category::query()
            ->where('status', Statuses::ACTIVE)
            ->get();

        return $categories->pluck('name', 'id');
    }

    public function getStatusOptions(): array
    {
        return Statuses::short_list();
    }

    public function getCategoryAttribute()
    {
        $category = Category::query()
            ->where('id', $this->category_id)
            ->firstOrFail();

        return $category->name;
    }

    public $belongsTo = [
        'parent_category' => [Category::class, 'key' => 'category_id'],
    ];
}
