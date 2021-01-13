<?php namespace Test\Profile\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('headline')->nullable();
            $table->string('about_me')->nullable();
            $table->string('music')->nullable();
        });
    }

    public function down()
    {
        $table->dropDown([
            'headline',
            'about_me',
            'music',
        ]);
    }
}