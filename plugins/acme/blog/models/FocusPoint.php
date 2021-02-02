<?php namespace Acme\Blog\Models;

use Model;

/**
 * FocusPoint Model
 */
class FocusPoint extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_focus_points';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

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
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'file' => \System\Models\File::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

	public static function getFromFile($file)
	{
	    //dd($file);
	    if ($file->focus_point)
	        return $file->focus_point;

	    $focus_point = new FocusPoint;
	    $focus_point->file = $file;

	    //dd($focus_point->file);
	    $focus_point->save();

	    $file->focus_point = $focus_point;

	    return $focus_point;
	}
}
