<?php namespace Sw33t\Rating;

use Backend;
use System\Classes\PluginBase;
use Rainlab\Blog\Models\Post as PostModel;
use Rainlab\Blog\Controllers\Posts as PostsController;
use Sw33t\Rating\Models\Rating as RatingModel;

/**
 * Rating Plugin Information File
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
            'name'        => 'Rating',
            'description' => 'Add Rating Stars to Blog Post',
            'author'      => 'Sw33t',
            'icon'        => 'icon-star'
        ];
    }
    
    public function boot()
    {
        PostModel::extend(function($model){
            $model->hasOne['rating'] = ['Sw33t\Rating\Models\Rating'];
        });
        PostsController::extendFormFields(function($form, $model, $context){
            
            if (!$model instanceof PostModel)
                return;
            
            if (!$model->exists)
                return;
            
            RatingModel::getFromPost($model);
            
            $form->addSecondaryTabFields([
                'rating[rating]' => [
                    'label' => 'Rating',
                    'tab' => 'Rating',
                ]
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
            'Sw33t\Rating\Components\MyComponent' => 'myComponent',
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
            'sw33t.rating.some_permission' => [
                'tab' => 'Rating',
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
            'rating' => [
                'label'       => 'Rating',
                'url'         => Backend::url('sw33t/rating/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['sw33t.rating.*'],
                'order'       => 500,
            ],
        ];
    }

}
