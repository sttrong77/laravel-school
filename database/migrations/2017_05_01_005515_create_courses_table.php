<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name',150);
            $table->string('url',20)->unique();
            $table->text('description')->nullable();
            $table->string('image',150)->default(null);
            $table->integer('code')->unique();
            $table->string('total_hours', 5);
            $table->boolean('published');
            $table->boolean('free')->default(false);
            $table->double('price',10,2);
            $table->double('price_plots',10,2);
            $table->integer('total_plots');
            $table->string('link_buy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
