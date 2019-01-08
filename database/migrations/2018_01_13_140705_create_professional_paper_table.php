<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalPaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('professional_paper')) {
            Schema::create('professional_paper', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('professional_id')->unsigned()->nullable();
                $table->integer('paper_id')->unsigned();
                $table->timestamps();

                $table->foreign('professional_id')->references('id')->on('professionals')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('professional_paper');
    }
}
