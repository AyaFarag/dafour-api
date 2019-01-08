<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('paper_keyword')) {
            Schema::create('paper_keyword', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('paper_id')->unsigned();
                $table->integer('keyword_id')->unsigned();
                $table->timestamps();

                $table->foreign('paper_id')->references('id')->on('papers')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('keyword_id')->references('id')->on('keywords')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('paper_keyword');
    }
}
