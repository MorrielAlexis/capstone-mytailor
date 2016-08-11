<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblLaborCharges', function (Blueprint $table) {
            $table->string('strLaborChargeID')->primary();
            $table->string('strLCSegmentFK');//fk
            $table->double('dblLCPrice');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strLCSegmentFK')
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
        Schema::drop('tblLaborCharges');
    }
}
