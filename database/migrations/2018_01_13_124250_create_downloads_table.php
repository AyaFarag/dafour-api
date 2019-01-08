<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('downloads')) {
            Schema::create('downloads', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('student_id')->unsigned()->nullable();
                $table->integer('paper_id')->unsigned();
                $table->timestamps();

                $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('set null');
                $table->foreign('paper_id')->references('id')->on('papers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('downloads');
    }
}
