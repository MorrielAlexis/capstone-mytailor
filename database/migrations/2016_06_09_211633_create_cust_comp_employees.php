<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustCompEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustCompEmployee', function (Blueprint $table) {
            $table->string('strCustCompEmployeeID')->primary();
            $table->string('strCustCompanyFK')->index();
            $table->string('strCustCompEmpFirstName');
            $table->string('strCustCompEmpLastName');
            $table->string('strCustCompEmpMiddleName')->nullable();
            $table->string('strCustCompEmpSex');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustCompanyFK')
                ->references('strCompanyID')
                ->on('tblCustCompany');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCustCompEmployees');
    }
}
