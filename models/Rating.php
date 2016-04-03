<?php namespace Sw33t\Rating\Models;

use Model;

/**
 * Rating Model
 */
class Rating extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sw33t_rating_ratings';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
   
    public $belongsTo = [
        'post' => ['RainLab\Blog\Models\Post']
    ];
    
    public static function getFromPost($post)
    {
        if ($post->rating)
            return $post->rating;
        
        $rating = new static;
        $rating->post = $post;
        $rating->save();
        
        $post->rating = $rating;
        
        return $rating;
    }
}