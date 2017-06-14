<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body_title');
            $table->string('body_sub_title');
            $table->string('body_content');
            $table->string('body_image');
            $table->string('body_type');
            $table->string('course_file_name');
            $table->string('course_file_url');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

            $table->integer('course_codes_id')->unsigned();
            $table->foreign('course_codes_id')
                ->references('id')
                ->on('course_codes');

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
        Schema::drop('course_materials');
    }
}
