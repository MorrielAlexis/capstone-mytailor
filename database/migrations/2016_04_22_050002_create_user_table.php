<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUser', function (Blueprint $table) {
            $table->string('strUserID')->primary();
            $table->string('strPassword');
            $table->string('strLoginEmpIDFK')->index();
            $table->string('strLogInCustIDFK')->index();
            $table->timestamps();

            $table->foreign('strLoginEmpIDFK')->references('strEmployeeID')->on('tblEmployee');
            $table->foreign('strLogInCustIDFK')->references('strCustID')->on('tblCustomer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblUser');
    }
}
