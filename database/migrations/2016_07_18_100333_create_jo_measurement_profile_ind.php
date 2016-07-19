<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoMeasurementProfileInd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJo_MeasureProfileInd', function (Blueprint $table) {
            $table->string('strMeasureProfileID')->primary();
            $table->string('strMeasProfCustIndivFK')->index();
            $table->string('strMeasProfMeasCategoryFK')->index();
            $table->string('strProfileName');
            $table->string('strUnitofMeasurement');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strMeasProfCustIndivFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            $table->foreign('strMeasProfMeasCategoryFK')
                  ->references('strMeasurementCategoryID')
                  ->on('tblMeasurementCategory');
                  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJo_MeasureProfileInd');
    }
}
