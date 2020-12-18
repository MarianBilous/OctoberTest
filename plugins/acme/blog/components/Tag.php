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

    public function defineProperties()
    {
        return [];
    }
}
