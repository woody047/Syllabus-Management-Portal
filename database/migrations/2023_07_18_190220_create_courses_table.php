<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('course_id');
            //1. Course code & course name
            $table->string('course_code',255);
            $table->string('course_name',255);
            //2. Synopsis
            $table->text('course_synopsis');
            //3. Name(s) of academic staff
            $table->string('course_staff',255)->nullable();
            //4. Trimester / Year offered
            $table->string('course_trimester',50);
            //5. Credit Value
            $table->string('course_credit',50);
            //6. Per-requisite / co-requisite
            $table->string('course_pre',255)->nullable();
            //7. Course Classification
            $table->string('course_classification',255);
            //8. Course learning outcomes and domain & taxonomy level
            $table->string('8CLO1',255)->nullable();
            $table->string('8CLO2',255)->nullable();
            $table->string('8CLO3',255)->nullable();
            $table->string('8CLO4',255)->nullable();
            $table->string('8DTL1',255)->nullable();
            $table->string('8DTL2',255)->nullable();
            $table->string('8DTL3',255)->nullable();
            $table->string('8DTL4',255)->nullable();
            //9. CO1
            $table->boolean('9CO1_PO1')->default(null);
            $table->boolean('9CO1_PO2')->default(null);
            $table->boolean('9CO1_PO3')->default(null);
            $table->boolean('9CO1_PO4')->default(null);
            $table->boolean('9CO1_PO5')->default(null);
            $table->boolean('9CO1_PO6')->default(null);
            $table->boolean('9CO1_PO7')->default(null);
            $table->boolean('9CO1_PO8')->default(null);
            $table->boolean('9CO1_PO9')->default(null);
            $table->string('CO1_L',50)->nullable();
            $table->string('CO1_A',50)->nullable();
            //9.CO2
            $table->boolean('9CO2_PO1')->default(null);
            $table->boolean('9CO2_PO2')->default(null);
            $table->boolean('9CO2_PO3')->default(null);
            $table->boolean('9CO2_PO4')->default(null);
            $table->boolean('9CO2_PO5')->default(null);
            $table->boolean('9CO2_PO6')->default(null);
            $table->boolean('9CO2_PO7')->default(null);
            $table->boolean('9CO2_PO8')->default(null);
            $table->boolean('9CO2_PO9')->default(null);
            $table->string('CO2_L',50)->nullable();
            $table->string('CO2_A',50)->nullable();
            //9.CO3
            $table->boolean('9CO3_PO1')->default(null);
            $table->boolean('9CO3_PO2')->default(null);
            $table->boolean('9CO3_PO3')->default(null);
            $table->boolean('9CO3_PO4')->default(null);
            $table->boolean('9CO3_PO5')->default(null);
            $table->boolean('9CO3_PO6')->default(null);
            $table->boolean('9CO3_PO7')->default(null);
            $table->boolean('9CO3_PO8')->default(null);
            $table->boolean('9CO3_PO9')->default(null);
            $table->string('CO3_L',50)->nullable();
            $table->string('CO3_A',50)->nullable();
            //9. CO4
            $table->boolean('9CO4_PO1')->default(null);
            $table->boolean('9CO4_PO2')->default(null);
            $table->boolean('9CO4_PO3')->default(null);
            $table->boolean('9CO4_PO4')->default(null);
            $table->boolean('9CO4_PO5')->default(null);
            $table->boolean('9CO4_PO6')->default(null);
            $table->boolean('9CO4_PO7')->default(null);
            $table->boolean('9CO4_PO8')->default(null);
            $table->boolean('9CO4_PO9')->default(null);
            $table->string('CO4_L',50)->nullable();
            $table->string('CO4_A',50)->nullable();
            //9. total
            $table->string('total_PO1',50)->nullable();
            $table->string('total_PO2',50)->nullable();
            $table->string('total_PO3',50)->nullable();
            $table->string('total_PO4',50)->nullable();
            $table->string('total_PO5',50)->nullable();
            $table->string('total_PO6',50)->nullable();
            $table->string('total_PO7',50)->nullable();
            $table->string('total_PO8',50)->nullable();
            $table->string('total_PO9',50)->nullable();
            //9. Other Teaching/Assessment Methods
            $table->string('9OTM',255);
            $table->string('9OAM',255);
            //10. TRANSFERABLE SKILLS
            $table->boolean('10TS1_Y')->default(null);
            $table->boolean('10TS1_N')->default(null);
            $table->boolean('10TS2_Y')->default(null);
            $table->boolean('10TS2_N')->default(null);
            $table->boolean('10TS3_Y')->default(null);
            $table->boolean('10TS3_N')->default(null);
            $table->boolean('10TS4_Y')->default(null);
            $table->boolean('10TS4_N')->default(null);
            $table->boolean('10TS5_Y')->default(null);
            $table->boolean('10TS5_N')->default(null);
            $table->boolean('10TS6_Y')->default(null);
            $table->boolean('10TS6_N')->default(null);
            $table->boolean('10TS7_Y')->default(null);
            $table->boolean('10TS7_N')->default(null);
            $table->boolean('10TS8_Y')->default(null);
            $table->boolean('10TS8_N')->default(null);
            $table->boolean('10TS9_Y')->default(null);
            $table->boolean('10TS9_N')->default(null);
            //11
            //foreign key (user_id)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //timestamps
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
