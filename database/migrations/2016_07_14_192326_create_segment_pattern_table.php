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
            $table->string('strSegPStyleCategoryFK')->index();//fk
            $table->string('strSegPName');
            $table->string('strSegPImage')->nullable();
            $table->double('dblPatternPrice');
            $table->text('txtSegPDesc')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strSegPInactiveReason')->nullable();
            $table->timestamps();

            $table->foreign('strSegPStyleCategoryFK')->references('strSegStyleCatID')->on('tblSegmentStyleCategory');
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
