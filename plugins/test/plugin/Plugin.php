<?php namespace Test\Plugin;

use Backend;
use System\Classes\PluginBase;
use Acme\Blog\Controllers\Articles as ArticlesController;
use Acme\Blog\Models\Article as ArticleModel;

/**
 * Plugin Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Plugin',
            'description' => 'No description provided yet...',
            'author'      => 'Test',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        ArticleModel::extend(function($model) {
            $model->attachMany['image_source'] = \System\Models\File::class;
        });

        ArticlesController::extendFormFields(function($form, $model, $context){
            if ($model instanceof ArticleModel) {
                $form->addTabFields([
                    'test' =>[
                        'label' => 'Test',
                        'type' => 'text',
                        'tab' => 'Test'
                    ],
                    'bio' =>[
                        'label' => 'Info',
                        'type' => 'textarea',
                        'tab' => 'Test'
                    ],
                    'image_source' => [
                        'label' => 'Image',
                        'mode' => 'image',
                        'useCaption' => 'true',
                        'span' => 'auto',
                        'type' => 'fileupload',
                        'tab' => 'Test'
                    ]
                ]);
            }
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Test\Plugin\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'test.plugin.some_permission' => [
                'tab' => 'Plugin',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'plugin' => [
                'label'       => 'Plugin',
                'url'         => Backend::url('test/plugin/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['test.plugin.*'],
                'order'       => 500,
            ],
        ];
    }
}
