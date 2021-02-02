<?php namespace Acme\Blog;

use Acme\Blog\Controllers\Photos;
use Acme\Blog\Controllers\FocusPoints;
use Acme\Blog\Models\FocusPoint;
use Acme\Blog\Models\Photo;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\Event;

use System\Models\File;
use Backend\Controllers\Files;

/**
 * Blog Plugin Information File
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
            'name'        => 'Blog',
            'description' => 'No description provided yet...',
            'author'      => 'Acme',
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
        $this->registerConsoleCommand('acme.my', 'Acme\Blog\Console\MyCommand');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        File::extend(function ($model) {
            $model->hasOne['focus_point'] = FocusPoint::class;

			//$model->bindEvent('model.beforeCreate', function() use ($model) {
			//    $model->focus_point = new FocusPoint;
			//});
        });

		Event::listen('backend.form.extendFields', function ($fields) {
			//dd($fields);
			if (!$fields->model instanceof File)
			    return;

            if (!$fields->model->exists)
                return;

			if (!$fields->model->focus_point)
                $fields->model->focus_point = new FocusPoint();

			//FocusPoint::getFromFile($fields->model);

			//if (!$fields->getController() instanceof FocusPoint)
			//    return;

            $fields->addFields([
                'focus_point[focus_x]' => [
                    'label' => 'Focus_x',
                    'type' => 'text',
                ],
                'focus_point[focus_y]' => [
                    'label' => 'Focus_y',
                    'type' => 'text',
                ],
                'focus_point[percentage_x]' => [
                    'label' => 'Percentage_x',
                    'type' => 'number',
                ],
                'focus_point[percentage_y]' => [
                    'label' => 'Percentage_y',
                    'type' => 'number',
                ],
            ]);
        });

		//Event::listen('backend.form.extendFields', function ($fields) {
		//    foreach (File::get() as $file) {
		//        if ($file->focus_point === null) {
		//            $file->focus_point = new FocusPoint;
		//            $file->save();
		//        }
		//    }
		//});

		//File::extend(function($model) {
		//    $model->addDynamicMethod('listStatuses', function($query) {
		//        return [
		//            1 => 'Main',
		//            2 => 'Main 2',
		//        ];
		//    });
		//});

		//FocusPoints::extendFormFields(function($form, $model, $context)
		//{
		//    if (!$model instanceof File) {
		//        return;
		//    }

		//    $form->addFields([
		//        'focus[test]' => [
		//            'label'   => 'Test',
		//            'type' => 'text',
		//        ],
		//    ]);
		//});

        Photos::extendFormFields(function($form, $model, $context)
        {
            if (!$model instanceof Photo) {
                return;
            }

            $form->addFields([
                'imageable_id' => [
                    'label'   => 'Imageable id',
                    'type' => 'number',
                    'span' => 'left',
                    'comment' => 'This is a custom field I have added.',
                ],
                'imageable_type' => [
                    'label'   => 'Imageable type',
                    'type' => 'text',
                    'span' => 'right',
                    'comment' => 'This is a custom field I have added.',
                ],
            ]);
        });

        Event::listen('seo.extendSeoFields', function ($fields) {

            $fields = array_add($fields,
                "seo_tag[Test]", [
                    "label" => "Test",
                    "tab" => "renatio.seomanager::lang.tab.meta",
                    "comment" => "renatio.seomanager::lang.comments.meta_title",
                    "commentHtml" => true,
                    "cssClass" => "countable",
                ]);

			//$fields->addFields([
			//    'test' => [
			//        'label'   => 'Test',
			//        'type' => 'text',
			//    ],
			//]);

			return $fields; // remember to return modified fields array
		});

        Event::listen('seo.beforeComponentRender', function ($component, $page) {
			//dd($page);
			if ($page->url == '/info-article/:slug') {
				$component->seoTag = $page->controller->vars['article']->seo_tag;
                $component->seoTag['meta_title'] = "New title";
                //dd($component->seoTag);
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
        return [
            'Acme\Blog\Components\category' => 'Category',
            'Acme\Blog\Components\tag' => 'Tag',
            'Acme\Blog\Components\articles' => 'Articles',
            'Acme\Blog\Components\ContactForm' => 'contactform',
            'Acme\Blog\Components\ArticleDetail' => 'articleDetail',
            'Acme\Blog\Components\TagDetail' => 'tagDetail',
            'Acme\Blog\Components\CategoryDetail' => 'categoryDetail',
            'Acme\Blog\Components\FacebookSignIn' => 'fbAPI',
            'Acme\Blog\Components\Polymorphic' => 'polymorph',
            'Acme\Blog\Components\Quize' => 'quiz',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'acme.blog.create_articles' => [
                'tab' => 'Blog',
                'label' => 'Create articles',
                'roles' => ['developer']
            ],
            'acme.blog.update_articles' => [
                'tab' => 'Blog',
                'label' => 'Update articles',
                'roles' => ['developer']
            ],
            'acme.blog.delete_articles' => [
                'tab' => 'Blog',
                'label' => 'Delete articles',
                'roles' => ['developer']
            ],
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Acme\Blog\ReportWidgets\ActivatedArticles' => [
                'label'   => 'Activated Articles',
                'context' => 'dashboard',
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Acme\Blog\FormWidgets\TagSelector' => 'tagselector',
            'Acme\Blog\FormWidgets\UniqueValue' => [
                'label' => 'Unique Value',
                'code' => 'uniquevalue'
            ],
            'Acme\Blog\FormWidgets\FocusPointWidget' => 'focuspointwidget'
        ];
    }

    public function registerSettings()
    {
        return [
            'setting' => [
                'label'       => 'My Settings',
                'description' => 'Manage based settings.',
                'category'    => 'Blogs',
                'icon'        => 'icon-cog',
                'class'       => 'Acme\Blog\Models\Setting',
                'order'       => 100
            ]
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'blog' => [
                'label'       => 'Blog',
                'url'         => \Backend::url('acme/blog/tags'),
                'icon'        => 'icon-pencil',
                'order'       => 500,

                'sideMenu' => [
                    'posts' => [
                        'label'       => 'Tag',
                        'icon'        => 'icon-tags',
                        'url'         => \Backend::url('acme/blog/tags'),
                    ],
                    'categories' => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-copy',
                        'url'         => \Backend::url('acme/blog/categories'),
                    ],
                    'articles' => [
                        'label'       => 'Articles',
                        'icon'        => 'icon-newspaper-o',
                        'url'         => \Backend::url('acme/blog/articles'),
                    ],
                    'contact' => [
                        'label'       => 'Contact',
                        'icon'        => 'icon-envelope',
                        'url'         => \Backend::url('acme/blog/contacts'),
                    ],
                    'mycontroller' => [
                        'label'       => 'My controller',
                        'icon'        => 'icon-magic',
                        'url'         => \Backend::url('acme/blog/mycontroller'),
                    ],
                    'photos' => [
                        'label'       => 'Photo',
                        'icon'        => 'icon-magic',
                        'url'         => \Backend::url('acme/blog/photos'),
                    ],
                    'focuspoints' => [
                        'label'       => 'Focus Point',
                        'icon'        => 'icon-magic',
                        'url'         => \Backend::url('acme/blog/focuspoints'),
                    ]
                ]
            ],
        ];
    }
}
