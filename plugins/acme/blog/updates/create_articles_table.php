<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('acme_blog_articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->text('content');
            $table->integer('category_id')->unsigned()->nullable();
            $table->boolean('visibility');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('acme_blog_categories')
                ->onDelete('SET NULL');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_blog_articles');
    }
}
