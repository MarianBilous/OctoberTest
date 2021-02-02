<?php namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFocusPointsTable extends Migration
{
    public function up()
    {
        Schema::create('acme_blog_focus_points', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->decimal('focus_x', 4, 3)->default(0);
            $table->decimal('focus_y', 4, 3)->default(0);
            $table->decimal('percentage_x', 6, 3)->default(50);
			$table->decimal('percentage_y', 6, 3)->default(50);

            $table->foreign('file_id')->references('id')->on('system_files')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_blog_focus_points');
    }
}
