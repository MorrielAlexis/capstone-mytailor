<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMeasurementCategory', function (Blueprint $table) {
            $table->string('strMeasCatID');
            $table->string('strMeasSegmentFK')->index();//fk
            $table->string('strMeasDetFK')->index();//fk
            $table->string('strMeasCatInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();          
            
            $table->primary('strMeasCatID','strMeasSegmentFK','strMeasDetFK');

            $table->foreign('strMeasSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');
            $table->foreign('strMeasDetFK')
                  ->references('strMeasurementDetailID')
                  ->on('tblMeasurementDetail');

            $table->unique(array('strMeasCatID', 'strMeasSegmentFK', 'strMeasDetFK'), 'strMeasCatPK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblMeasurementCategory');
    }
}
