<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMeasurementDetail', function (Blueprint $table) {
            $table->string('strMeasurementDetailID')->primary();
            $table->string('strMeasDetSegmentFK')->index();
            $table->string('strMeasCategoryFK')->index();
            $table->string('strMeasDetailName');
            $table->string('strMeaDetailImage')->nullable();
            $table->text('txtMeasDetailDesc')->nullable();
            $table->double('dblMeasDetailMinCm')->nullable();
            $table->double('dblMeasDetailMinInch')->nullable();
            $table->string('strMeasDetInactiveReason');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strMeasDetSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strMeasCategoryFK')
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
        Schema::drop('tblMeasurementDetail');
    }
}
