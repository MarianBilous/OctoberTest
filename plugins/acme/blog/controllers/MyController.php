<?php namespace Acme\Blog\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use October\Rain\Support\Facades\Flash;

/**
 * My Controller Back-end Controller
 */
class MyController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'mycontroller');
    }

    public function index()
    {
        $config = $this->makeConfig('$/acme/blog/models/mytestmodel/columns.yaml');
        $config->model = new \Acme\Blog\Models\MyTestModel();
        $config->recordUrl = 'acme/blog/mycontroller/update/:id';
        $widget = $this->makeWidget('\Backend\Widgets\Lists', $config);
        $widget->bindToController();
        $this->vars['widget'] = $widget;

        //return \Backend::redirect('acme/blog/tests/helloworld');
    }

    public function update($id = null)
    {
        $config = $this->makeConfig('$/acme/blog/models/mytestmodel/fields.yaml');
        $config->model = \Acme\Blog\Models\MyTestModel::find($id);
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $this->vars['widget'] = $widget;
    }

    public function onUpdate($id = null)
    {
        $data = post();
        $mytest = \Acme\Blog\Models\MyTestModel::find($id);
        $mytest->test_field = post('test_field');
        $mytest->save();

        //trace_log(post('test_field'));

        \Flash::success('Jobs done!');
    }

    public function helloworld()
    {
        //$this->vars['name'] = "hello";
    }

}
