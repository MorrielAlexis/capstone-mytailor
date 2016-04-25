<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementCategoryDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMetCategory_Detail', function (Blueprint $table) {
            $table->string('strMesCatIDfk')->index();
            $table->foreign('strMesCatIDfk')->references('strMeasCatID')->on('tblMeasurementCategory');
            $table->string('strMesDetIDfk')->index();
            $table->foreign('strMesDetIDfk')->references('strMeasurementDetailID')->on('tblMeasurementDetail');
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
        Schema::drop('tblMetCategory_Detail');
    }
}
