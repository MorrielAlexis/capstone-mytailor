<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoCompEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOCompEmployees', function (Blueprint $table) {
            $table->string('strCompEmployeeID');
            $table->string('strCompanyIDFK')->index();
            $table->string('strCompEmployeeName');
            $table->string('strCompEmployeeSex');
            $table->string('strMeasurementCategoryFK')->index();
            $table->string('strBodyPartFormFK')->index();
            $table->string('strUnitofMeasurement');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->primary('strCompEmployeeID', 'strCompanyIDFK');

            $table->foreign('strCompanyIDFK')
                  ->references('strCompanyID')
                  ->on('tblCustCompany');

  
            $table->foreign('strMeasurementCategoryFK')
                  ->references('strMeasurementCategoryID')
                  ->on('tblMeasurementCategory');

            $table->foreign('strBodyPartFormFK')
                  ->references('strBodyFormID')
                  ->on('tblBodyPartForm');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOCompEmployees');
    }
}
