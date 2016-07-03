<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoborderSegmentpatternTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJO_SegmentPattern', function (Blueprint $table) {
            $table->string('strJobOrderID')->index();//fk
            $table->string('strSegPatternID')->index();//fk
            $table->primary('strJobOrderID', 'strSegPatternID');//primary key
            $table->boolean('boolIsActive');
            $table->boolean('boolIsFinish');
            

            $table->timestamps();

            $table->foreign('strJobOrderID')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');
            $table->foreign('strSegPatternID')
                  ->references('strSegPatternID')
                  ->on('tblSegmentPattern');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJO_SegmentPattern');
    }
}
