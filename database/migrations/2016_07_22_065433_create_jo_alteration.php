<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoAlteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOAlteration', function (Blueprint $table) {
            $table->string('strJOAlterationID')->primary();
            $table->string('strAlterationType');
            $table->string('strAlterationFK')->index();
            $table->text('txtAlterationNotes');
            $table->string('strSegmentMeasSpecFK')->index()->nullable();
            $table->string('strSegmentNonShopSpecFK')->index()->nullable();
            $table->timestamps();

            $table->foreign('strSegmentNonShopSpecFK')
                  ->references('strNonAlterSpecificID')
                  ->on('tblNonShopAlterSpecific');

            $table->foreign('strSegmentMeasSpecFK')
                  ->references('strJOMeasureSpecificID')
                  ->on('tblJOMeasureSpecific');


            $table->foreign('strAlterationFK')
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
        Schema::drop('tblJOAlteration');
    }
}
