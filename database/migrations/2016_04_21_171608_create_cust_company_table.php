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
            $table->string('strCompanyID');
            $table->string('strCompanyName');
            $table->string('strCompanyBuildingNo');
            $table->string('strCompanyStreet');
            $table->string('strCompanyBarangay')->nullable()->change();
            $table->string('strCompanyCity');
            $table->string('strCompanyProvince');
            $table->string('strCompanyZipCode');
            $table->string('strContactPerson');
            $table->string('strCompanyEmailAddress')->unique();
            $table->string('strCompanyTelNumber')->nullable();
            $table->string('strCompanyCPNumber');
            $table->string('strCompanyCPNumberAlt')->nullable();
            $table->string('strCompanyFaxNumber')->nullable();
            $table->string('strCompanyInactiveReason');
            $table->string('strCompanyInactiveReason');
            $table->boolean('boolIsActive');
            $table->timestamps();
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
    }
}
