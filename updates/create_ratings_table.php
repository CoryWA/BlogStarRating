<?php namespace Sw33t\Rating\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateRatingsTable extends Migration
{

    public function up()
    {
        Schema::create('sw33t_rating_ratings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index();
            $table->string('rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sw33t_rating_ratings');
    }

}
