<?php namespace Acme\Blog\Components;

use Acme\Blog\Models\Article;
use Cms\Classes\ComponentBase;

class Category extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Category Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function getCategory()
    {
        return \Acme\Blog\Models\Category::all();
    }

    public function defineProperties()
    {
        return [];
    }


}
