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
}
