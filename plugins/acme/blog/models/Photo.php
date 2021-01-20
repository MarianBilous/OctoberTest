<?php namespace Acme\Blog\Models;

use Model;

/**
 * Photo Model
 */
class Photo extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_photos';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type',
        'country',
        'state'
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

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
    public $hasMany = [];
    public $belongsTo = [
    ];
    public $belongsToMany = [];
    public $morphTo = [
        'imageable' => []
    ];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getCountryOptions()
    {
        return ['au' => 'Australia', 'ca' => 'Canada'];
    }

    public function getStateOptions()
    {
        //dd($this->country);
        if ($this->country == null)
            return ['act' => 'Capital Territory', 'qld' => 'Queensland'];
        //dd($this->country);
        elseif ($this->country == 'au') {
            return ['act' => 'Capital Territory', 'qld' => 'Queensland'];
        }
        elseif ($this->country == 'ca') {
            return ['bc' => 'British Columbia', 'on' => 'Ontario'];
        }
    }

    public function filterFields($fields, $context = null)
    {
        //dd($fields);
        if ($this->imageable_id == 1) {
            $fields->path->disabled = true;
        }
        elseif ($this->imageable_id == 3) {
            $fields->path->disabled = true;
        }
    }
}
