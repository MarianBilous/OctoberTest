<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::table('acme_blog_photos', function (Blueprint $table) {
            $table->string('country')->nullable();
            $table->string('state')->nullable();
        });
    }

    public function down()
    {
        $table->dropColumn('country');
        $table->dropColumn('state');
    }
}
