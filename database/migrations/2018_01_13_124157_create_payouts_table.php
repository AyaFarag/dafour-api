<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('payouts')) {
            Schema::create('payouts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('professional_id')->unsigned();
                $table->enum('status', ['approved', 'pending', 'rejected'])->default('pending');
                $table->text('comment')->nullable(); // Comment about status (e.g. "Rejected for some reason")
                $table->timestamp('transaction_time');
                $table->timestamps();

                $table->foreign('professional_id')->references('id')->on('professionals')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('payouts');
    }
}
