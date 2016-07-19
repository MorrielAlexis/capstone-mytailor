<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificsStandardSizeMeasure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecStandardSizeMeasure', function (Blueprint $table) {
            $table->string('strJoSpecificsFk')->index();
            $table->string('strMeasurementProfileFk')->index();
            $table->string('strStandardSizeFk')->index();
            $table->string('strStandardSizeFitType');
            $table->text('txtNote');
            $table->timestamps();
            $table->primary('strJoSpecificsFk');

            $table->foreign('strJoSpecificsFk')
                  ->references('strJOSpecificsID')
                  ->on('tblJOSpecificsInd');
  
            $table->foreign('strMeasurementProfileFk')
                  ->references('strMeasureProfileID')
                  ->on('tblJo_MeasureProfileInd');


            $table->foreign('strStandardSizeFk')
                  ->references('strStandardSizeDetID')
                  ->on('tblStandardSizeDetail');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOSpecStandardSizeMeasure');
    }
}
