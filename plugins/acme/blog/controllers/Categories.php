<?php namespace Acme\Blog\Controllers;

use Acme\Blog\Models\Article;
use Acme\Blog\Models\Category;
use BackendMenu;
use Backend\Classes\Controller;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string Configuration file for the `ReorderController` behavior.
     */
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'categories');
    }

    public function onLoadPopup()
    {
        return $this->makePartial('$/acme/blog/controllers/categories/_add_child_popup.htm', ['id' => post('id')]);
    }

    public function onAddChild()
    {
        if (post('id')) {
            $parent = Category::find(post('id'));
            $parent->children()->create(['name' => post('name')]);
            $parent->save();
        }

        return $this->listRefresh();
    }

    public function onDeleteChild()
    {
        if (post('id')) {
            $parent = Category::find(post('id'));
            $parent->delete();
            $parent->save();
        }

        return $this->listRefresh();
    }
}
