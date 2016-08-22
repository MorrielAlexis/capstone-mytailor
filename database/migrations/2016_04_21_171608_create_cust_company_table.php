<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustCompany', function (Blueprint $table) {
            $table->string('strCompanyID')->primary();
            $table->string('strCompanyName');
            $table->string('strCompanyBuildingNo');
            $table->string('strCompanyStreet');
            $table->string('strCompanyBarangay')->nullable();
            $table->string('strCompanyCity');
            $table->string('strCompanyProvince');
            $table->string('strCompanyZipCode');
            $table->string('strContactPerson');
            $table->string('strCompanyEmailAddress');
            $table->string('strCompanyTelNumber')->nullable();
            $table->string('strCompanyCPNumber');
            $table->string('strCompanyCPNumberAlt')->nullable();
            $table->string('strCompanyFaxNumber')->nullable();
            $table->string('strCompanyInactiveReason')->nullable();
            $table->string('userId')->index()->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();
        });

        Schema::table('tblCustCompany', function (Blueprint $table){
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCustCompany');
        Schema::table('tblCustCompany', function ($table){
            $table->dropColumn('userId');
        });
    }
}
