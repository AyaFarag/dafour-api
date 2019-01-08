<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUniqueIndexFromEmailMobileColumnsInStudentsAndProfissionalsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropUnique('students_email_unique');
        });
        Schema::table('professionals', function (Blueprint $table) {
            $table->dropUnique('professionals_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unique('email');
        });
        Schema::table('professionals', function (Blueprint $table) {
            $table->unique('email');
        });
    }
}
