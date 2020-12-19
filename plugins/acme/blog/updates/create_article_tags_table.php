<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticleTagsTable extends Migration
{
    public function up()
    {
        Schema::create('acme_blog_article_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('article_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('article_id')
                ->references('id')
                ->on('acme_blog_articles')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')
                ->on('acme_blog_tags')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_blog_article_tags');
    }
}
