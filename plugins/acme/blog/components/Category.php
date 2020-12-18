<?php namespace Acme\Blog\Components;

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

    public function defineProperties()
    {
        return [];
    }


}
