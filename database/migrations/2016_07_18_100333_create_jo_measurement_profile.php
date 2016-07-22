<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoMeasurementProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJo_MeasureProfile', function (Blueprint $table) {
            $table->string('strJOMeasureProfileID')->primary();
            $table->string('strMeasProfCustIndivFK')->index()->nullable();
            $table->string('strMeasProfCustCompanyFK')->index()->nullable();
            $table->string('strProfileName');
            $table->string('strSex');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strMeasProfCustIndivFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            $table->foreign('strMeasProfCustCompanyFK')
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
        Schema::drop('tblJo_MeasureProfileInd');
    }
}
