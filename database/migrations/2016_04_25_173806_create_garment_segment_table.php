<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarmentSegmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblGarment_Segment', function (Blueprint $table) {
            $table->string('strGarmCategoryIDfk')->index();
            $table->foreign('strGarmCategoryIDfk')->references('strGarmentCategoryID')->on('tblGarmentCategory');
            $table->string('strSegmentfk')->index();
            $table->foreign('strSegmentfk')->references('strSegmentID')->on('tblSegment');

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
        Schema::drop('tblGarment_Segment');
    }
}
