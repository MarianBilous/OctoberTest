<?php namespace Acme\Blog\Models;

use October\Rain\Database\Pivot;

class ArticleTagPivot extends Pivot
{
    public function beforeSave()
    {
        if (empty($this->article_id))
        {
            $this->article_id = static::max('article_id') + 1;
        }
    }

    public $hasMany = [
        'tag' => 'Acme\Blog\Models\Tag',
        'article' => 'Acme\Blog\Models\Article',
    ];
}