<?php namespace Test\Plugin\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddNewFields extends Migration
{
    public function up()
    {
        Schema::table('acme_blog_articles', function (Blueprint $table) {
            $table->string('test')->nullable();
            $table->text('bio')->nullable();
        });
    }

    public function down()
    {
        $table->dropDown([
            'test',
            'bio',
        ]);
    }
}
