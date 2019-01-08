<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('references')) {
            Schema::create('references', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('paper_id')->unsigned();
                $table->string('title');
                $table->string('link')->nullable();
                $table->timestamps();

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
        Schema::dropIfExists('references');
    }
}
