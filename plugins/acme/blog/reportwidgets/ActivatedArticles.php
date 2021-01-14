<?php namespace Acme\Blog\ReportWidgets;

use Acme\Blog\Models\Article;
use Backend\Classes\ReportWidgetBase;
use Exception;
use October\Rain\Support\Facades\Flash;

/**
 * ActivatedArticles Report Widget
 */
class ActivatedArticles extends ReportWidgetBase
{
    /**
     * Defines the widget's properties
     * @return array
     */
    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'Activated Articles',
                'default'           => 'Activated Articles Report Widget',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ],
        ];
    }
            
    /**
     * Renders the widget's primary contents.
     * @return string HTML markup supplied by this widget.
     */
    public function render()
    {
        
        try {
            $this->prepareVars();
        } catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('activatedarticles');
    }

    /**
     * Prepares the report widget view data
     */
    public function prepareVars()
    {
        
    }

    public function getSaveValue($value)
    {
        return $value;
    }

    public function onCheckArticle()
    {
        $article = Article::find(post('article_id'));

        if(!empty($article)) {
            if ($article->visibility == true) {
                Flash::success('Article is active');
            } else {
                Flash::error('Article is not active');
            }  
        } else {
            Flash::error('There are no articles with this ID!');
        }      
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        //$this->addCss('css/select2.css', 'Acme.Blog');
        $this->addJs('check-article.js', 'Acme.Blog');
    }
}
