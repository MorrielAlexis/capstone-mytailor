<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNeedle', function (Blueprint $table) {
            $table->increments('intNeedleID');
            $table->string('strNeedleBrand');
            $table->string('strNeedleSize');
            $table->string('strNeedleDesc')->nullable();
            $table->string('strNeedleImage')->nullable();
            $table->string('strNeedleInactiveReason');
            $table->boolean('boolIsActive');
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
        Schema::drop('tblNeedle');
    }
}
