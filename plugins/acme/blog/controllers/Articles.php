<?php namespace Acme\Blog\Controllers;

use Acme\Blog\Models\Article;
use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Log;
use October\Rain\Support\Facades\Flash;

use Illuminate\Support\Facades\Event;
// use Illuminate\Support\Facades\Response;
// use Illuminate\Support\Facades\View;

/**
 * Articles Back-end Controller
 */
class Articles extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $requiredPermissions = [
        'acme.blog.create_articles',
        'acme.blog.update_articles',
        'acme.blog.delete_articles'
    ];

    /**
     * @var string Configuration file for the `ImportExportController` behavior.
     */
    public $importExportConfig = 'config_import_export.yaml';

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `RelationController` behavior.
     */
    public $relationConfig = 'config_relation.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'articles');
    }

    public function create($context = null)
    {
        if (!$this->user->hasAccess(['acme.blog.create_articles'])) {
            return \Response::make(\View::make('backend::access_denied'), 403);
        }
        return $this->asExtension('FormController')->create($context);
    }

    public function update($recordId = null, $context = null)
    {
        if (!$this->user->hasAccess(['acme.blog.update_articles'])) {
            return \Response::make(\View::make('backend::access_denied'), 403);
        }
        return $this->asExtension('FormController')->update($recordId, $context);
    }

    public function onMakeActive()
    {
        $article = new Article;
        if ($checked = post('checked')) {
            foreach ($checked as $id) {
                //Log::info($id);
                $article = Article::find($id);
                $article->visibility = true;
                $article->save();
            }
        }
    }
    
    public function onMakeActiveOne()
    {
        //Log::info(post('id'));
        if (post('id')) {
            $article = Article::find(post('id'));
            $article->visibility = true;
            $article->save();
        }
        return $this->listRefresh();
    }

    public function listExtendColumns($list)
    {
        $list->addColumns([
            'test111'
        ]);
    }


}
