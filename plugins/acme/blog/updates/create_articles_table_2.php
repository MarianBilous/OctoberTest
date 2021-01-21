<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('acme_blog_articles', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false);
        });
    }

    public function down()
    {
        $table->dropColumn('is_featured');
    }
}
