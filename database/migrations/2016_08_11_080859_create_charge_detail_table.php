<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblChargeDetail', function (Blueprint $table) {
            $table->string('strChargeDetailID')->primary();
            $table->string('strChargeCatFK');//fk
            $table->string('strChargeDetSegFK');//fk
            $table->double('dblChargeDetPrice');
            $table->string('strChargeDetInactiveReason');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strChargeDetSegFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strChargeCatFK')
                  ->references('strChargeCatID')
                  ->on('tblChargeCategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblChargeDetail');
    }
}
