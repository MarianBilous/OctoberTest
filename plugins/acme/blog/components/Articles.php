<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Acme\Blog\Models\Category;

class Articles extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Articles Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function getCategory()
    {
        return Category::all();
    }

    public function defineProperties()
    {
        return [];
    }
}
