<?php namespace Test\Profile;

use Backend;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;
use System\Classes\PluginBase;
use Test\Profile\Models\Profile;

/**
 * Profile Plugin Information File
 */
class Plugin extends PluginBase
{
    //public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Profile',
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
         UserModel::extend(function ($model)
         {
             $model->hasOne['profile'] = ['Test\Profile\Models\Profile'];
         });

		UsersController::extendListColumns(function($list, $model) {
		    if (!$model instanceof UserModel)
		    return;

		    $list->addColumns([
		        'profile[headline]' => [
		            'label' => 'Headline',
		        ],
		        'about_me' => [
		            'label' => 'About me',
		        ],
		        'music' => [
		            'label' => 'Music',
		        ],
		    ]);

		});

        UsersController::extendFormFields(function($form, $model, $context) {
            if (!$model instanceof UserModel)
                return;

			if (!$model->exists)
                return;

            Profile::getFromUser($model);

            $form->addTabFields([

                'profile[headline]' => [
                    'label' => 'Headline',
                    'tab' => 'Profile',
                    'type' => 'text',
                ],
                'profile[about_me]' => [
                    'label' => 'About me',
                    'tab' => 'Profile',
                    'type' => 'text',
                ],
                'profile[music]' => [
                    'label' => 'Music',
                    'tab' => 'Profile',
                    'type' => 'text',
                ],
            ]);

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
            'Test\Profile\Components\MyComponent' => 'myComponent',
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
            'test.profile.some_permission' => [
                'tab' => 'Profile',
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
            'profile' => [
                'label'       => 'Profile',
                'url'         => Backend::url('test/profile/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['test.profile.*'],
                'order'       => 500,
            ],
        ];
    }
}
