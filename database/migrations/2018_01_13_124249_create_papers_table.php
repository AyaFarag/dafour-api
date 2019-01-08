<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('papers')) {
            Schema::create('papers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('abstract');
                $table->string('file');
                $table->date('publication_date');
                $table->integer('school_id')->unsigned()->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('papers');
    }
}
