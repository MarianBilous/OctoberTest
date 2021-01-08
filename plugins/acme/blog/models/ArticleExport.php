<?php namespace Acme\Blog\Models;

use \Backend\Models\ExportModel;

/**
 * ArticleExport Model
 */
class ArticleExport extends ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $articles = Article::all();
        $articles->each(function($article) use ($columns) {
            $article->addVisible($columns);
        });
        return $articles->toArray();
    }
}
