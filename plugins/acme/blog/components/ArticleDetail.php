<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Acme\Blog\Models\Article;

class ArticleDetail extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'ArticleDetail Component',
            'description' => 'No description provided yet...'
        ];
    }

    function getSlug()
    {
        return Article::where('slug', $this->param('slug'))->first();
    }

    public function defineProperties()
    {
        return [];
    }
}
