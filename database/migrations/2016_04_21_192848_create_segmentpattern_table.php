<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentpatternTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSegmentPattern', function (Blueprint $table) {
            $table->string('strSegPatternID')->primary();
            $table->string('strSegPCategoryFK')->index();//fk
            $table->string('strSegPNameFK')->index();//fk
            $table->string('strSegPName');
            $table->string('strSegPImage')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strSegPInactiveReason')->nullable();
            $table->timestamps();

            $table->foreign('strSegPCategoryFK')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');
            $table->foreign('strSegPNameFK')->references('strSegmentID')->on('tblSegment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblSegmentPattern');
    }
}
