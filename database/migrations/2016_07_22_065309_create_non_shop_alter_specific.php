<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonShopAlterSpecific extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNonShopAlterSpecific', function (Blueprint $table) {
            $table->string('strNonAlterSpecificID')->primary();
            $table->string('strNonShopAlterFK')->index();
            $table->string('strGarmentSegmentFK')->index();
            $table->timestamps();

            $table->foreign('strNonShopAlterFK')
                  ->references('strNonShopAlterID')
                  ->on('tblNonShopAlteration');

            $table->foreign('strGarmentSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');
        });
       
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblNonShopAlterSpecific');
    }
}
