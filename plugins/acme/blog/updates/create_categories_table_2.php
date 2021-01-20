<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('acme_blog_categories', function (Blueprint $table) {
            $table->boolean('is_delayed')->default(0);
            $table->string('info')->nullable();
        });
    }

    public function down()
    {
        $table->dropColumn('is_delayed');
        $table->dropColumn('info');
    }
}
