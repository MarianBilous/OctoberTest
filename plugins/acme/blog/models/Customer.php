<?php namespace Acme\Blog\Models;

use Model;

/**
 * Customer Model
 */
class Customer extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_blog_customers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    public $hasMany = [
        'orders' => Order::class
    ];
}
