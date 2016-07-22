<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementStandardSizeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblStandardSizeDetail', function (Blueprint $table) {
            $table->string('strStandardSizeDetID')->primary();
            $table->string('strStanSizeSegmentFK')->index();
            $table->string('strStanSizeMeasCatFK')->index();
            $table->string('strStanSizeCategoryFK')->index();
            $table->string('strStanSizeDetailName');
            $table->string('strStanSizeFitType')->nullable();
            $table->double('dblStanSizeInch');
            // $table->double('dblStanSizeCm');
            $table->text('txtStanSizeDesc');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strStanSizeSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strStanSizeMeasCatFK')
                  ->references('strMeasurementCategoryID')
                  ->on('tblMeasurementCategory');

            $table->foreign('strStanSizeCategoryFK')
                  ->references('strStandardSizeCategoryID')
                  ->on('tblStandardSizeCategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblStandardSizeDetail');
    }
}
