<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //
        Schema::create('course_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->text('courseOutline');
            $table->text('CO');
            $table->integer('L');
            $table->integer('T');
            $table->integer('P');
            $table->integer('O');
            $table->integer('GuidedLearning');
            $table->integer('IndependentLearning');
            $table->integer('TotalSLT');
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
        Schema::dropIfExists('course_rows');
    }
}
