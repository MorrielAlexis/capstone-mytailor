<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAlteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAlteration', function (Blueprint $table) {
            $table->string('strAlterationID')->primary();
            $table->string('strAlterationName');
            $table->string('strAlterationSegmentFK')->index();//fk
            $table->text('txtAlterationDesc')->nullable();
            $table->double('dblAlterationPrice');
            $table->string('strAlterationInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strAlterationSegmentFK')
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
        Schema::drop('tblAlteration');
    }
}
