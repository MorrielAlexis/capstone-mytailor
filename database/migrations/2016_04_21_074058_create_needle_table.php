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
        Schema::create('tblMaterialNeedle', function (Blueprint $table) {
            $table->string('strMaterialNeedleID')->primary();
            $table->string('strMaterialNeedleBrand');
            $table->string('strMaterialNeedleSize');
            $table->string('strMaterialNeedleDesc')->nullable();
            $table->string('strMaterialNeedleImage')->nullable();
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
        Schema::drop('tblMaterialNeedle');
    }
}
