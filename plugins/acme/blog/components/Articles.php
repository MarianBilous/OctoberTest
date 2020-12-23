<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Acme\Blog\Models\Article;

class Articles extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Articles Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function getArticle()
    {
        return Article::where('visibility', true)->orderBy('created_at', 'desc')->get();
    }

    public function defineProperties()
    {
        return [];
    }
}
