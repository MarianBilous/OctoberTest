<?php namespace Acme\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Tests Back-end Controller
 */
class Tests extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'tests');
    }

    public function index()
    {
        $config = $this->makeConfig('$/acme/blog/models/article/columns.yaml');
        $config->model = new \Acme\Blog\Models\Article;
        $config->recordUrl = 'acme/blog/tests/update/:id';
        $widget = $this->makeWidget('\Backend\Widgets\Lists', $config);
        $widget->bindToController();
        $this->vars['widget'] = $widget;

        //return \Backend::redirect('acme/blog/tests/helloworld');
    }

    public function update($id = null)
    {
        $config = $this->makeConfig('$/acme/blog/models/article/fields.yaml');
        $config->model = \Acme\Blog\Models\Article::find($id);
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $this->vars['widget'] = $widget;
    }

    public function onUpdate($id = null)
    {

    }

    public function helloworld()
    {
        //$this->vars['name'] = "hello";
    }
}
