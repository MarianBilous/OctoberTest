<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMyTestModelsTable extends Migration
{
    public function up()
    {
        Schema::create('acme_blog_my_test_models', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('test_field')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_blog_my_test_models');
    }
}
