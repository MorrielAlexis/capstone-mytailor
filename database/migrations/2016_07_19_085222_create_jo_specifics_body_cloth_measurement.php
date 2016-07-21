<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificsBodyClothMeasurement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBodyClothMeasTrans', function (Blueprint $table) {
            $table->string('strJoSpecificsFk')->index();
            $table->string('strMeasurementProfileFk')->index();
            $table->string('strMeasurementDetailFk')->index();
            $table->double('dblActualMeasurement');
            $table->timestamps();
            $table->primary('strJoSpecificsFk');

            $table->foreign('strJoSpecificsFk')
                  ->references('strJOSpecificsID')
                  ->on('tblJOSpecificsInd');
  
            $table->foreign('strMeasurementProfileFk')
                  ->references('strMeasureProfileID')
                  ->on('tblJo_MeasureProfileInd');


            $table->foreign('strMeasurementDetailFk')
                  ->references('strMeasurementDetailID')
                  ->on('tblMeasurementDetail');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblBodyClothMeasTrans');
    }
}
