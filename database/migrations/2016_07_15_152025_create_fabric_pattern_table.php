<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricPatternTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFabricPattern', function (Blueprint $table) {
            $table->string('strFabricPatternID')->primary();
            $table->string('strFabricPatternName');
            $table->text('txtFabricPatternDesc')->nullable();
            $table->string('strFabricPatternInactiveReason')->nullable();
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
        Schema::drop('tblFabricPattern');
    }
}
