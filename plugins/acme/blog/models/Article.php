<?php namespace Acme\Blog\Models;

use Model;

/**
 * Article Model
 */
class Article extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;


    protected $slugs = [
        'slug' => 'name'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_articles';

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
        'content',
        'image',
        'category_id',
        'visibility',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required',
        'content' => 'required',
        'image' => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [

    ];
    public $hasMany = [];
    public $belongsTo = [
        'category' => 'Acme\Blog\Models\Category'
    ];
    public $belongsToMany = [
        'tag' => [
            'Acme\Blog\Models\Tag',
            'table' => 'acme_blog_article_tags',
            'order' => 'name'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => 'System\Models\File'
    ];
    public $attachMany = [];
}
