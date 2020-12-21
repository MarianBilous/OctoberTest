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
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['article_id','tag_id']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_blog_article_tags');
    }
}
