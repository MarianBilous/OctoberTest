<?php namespace Acme\Blog\Models;

use Model;

/**
 * Order Model
 */
class Order extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_orders';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $hasMany = [
        'items' => Item::class
    ];

    public $belongsTo = [
        'customer' => Customer::class
    ];

    public function getSetupCodeAttribute()
    {
        return strtoupper(str_random(8));
    }
}
