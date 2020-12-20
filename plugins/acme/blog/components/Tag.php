<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;

class Tag extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Tag Component',
            'description' => 'No description provided yet...'
        ];
    }
    public function getTag()
    {
        return \Acme\Blog\Models\Tag::all();
    }

    public function defineProperties()
    {
        return [];
    }
}
