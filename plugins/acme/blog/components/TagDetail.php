<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Acme\Blog\Models\Article;
use Acme\Blog\Models\Tag;

class TagDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'TagDetail Component',
            'description' => 'No description provided yet...'
        ];
    }

    function getSlug()
    {
        return Tag::where('slug', $this->param('slug'))->first();
    }

    public function defineProperties()
    {
        return [];
    }
}
