<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('student_plan')) {
            Schema::create('student_plan', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('student_id')->unsigned();
                $table->integer('plan_id')->unsigned();
                $table->timestamp('start_date');
                $table->timestamp('end_date')->nullable();
                $table->timestamps();

                $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_plan');
    }
}
