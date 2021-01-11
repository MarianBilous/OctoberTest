<?php namespace Acme\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Tests Back-end Controller
 */
class Tests extends Controller
{
    public function index()
    {
        return \Backend::redirect('acme/blog/tests/helloworld');
    }
    
    public function helloworld()
    {
        $this->vars['name'] = "hello";
    }
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'tests');
    }
}
