<?php namespace Acme\Blog\Components;

use Acme\Blog\Models\Article;
use Acme\Blog\Models\Category;
use Cms\Classes\ComponentBase;

class CategoryDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'CategoryDetail Component',
            'description' => 'No description provided yet...'
        ];
    }
    public function getSlug()
    {
        return Category::where('slug', $this->param('slug'))->first();
    }

    public function getArticles()
    {
        return Article::where('category_id', $this->getSlug()->id)->get();
    }


    public function defineProperties()
    {
        return [];
    }
}
