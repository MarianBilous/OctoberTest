<?php namespace Acme\Blog\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;
    //use \October\Rain\Database\Traits\NestedTree;

    /**
     * @var array Generate slugs for these attributes.
     */
    protected $slugs = [
        'slug' => 'name'
    ];

//    public function afterSave() {
//        if ($this->position == null) {
//            $this->position = $this->id;
//            $this->save();
//        }
//    }

    public function beforeValidate()
    {
        if (empty($this->sort_order))
        {
            $this->sort_order = static::max('sort_order') + 1;
        }
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_categories';

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
        'visibility',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

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
    public $hasOne = [];

    public $hasMany = [
        'article' => 'Acme\Blog\Models\Article'
    ];

    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
