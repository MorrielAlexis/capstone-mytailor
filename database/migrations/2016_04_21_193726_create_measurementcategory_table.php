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
            $table->string('strMeasGarFK')->index();//fk
            $table->string('strMeasSegmentFK')->index();//fk
            $table->string('strMeasDetFK')->index();//fk
            $table->string('strMeasCatInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();          
            
            $table->primary('strMeasCatID','strMeasGarFK','strMeasSegmentFK','strMeasDetFK');

            $table->foreign('strMeasGarFK')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');
            $table->foreign('strMeasSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');
            $table->foreign('strMeasDetFK')
                  ->references('strMeasurementDetailID')
                  ->on('tblMeasurementDetail');

            $table->unique(array('strMeasCatID', 'strMeasGarFK', 'strMeasSegmentFK', 'strMeasDetFK'));
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
