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
            $table->string('strAlterationTypeFK')->index();
            $table->text('txtAlterationDesc')->nullable();
            $table->timestamps();

            $table->foreign('strNonShopAlterFK')
                  ->references('strNonShopAlterID')
                  ->on('tblNonShopAlteration');

            $table->foreign('strGarmentSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

             $table->foreign('strAlterationTypeFK')
                  ->references('strAlterationID')
                  ->on('tblAlteration');
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
