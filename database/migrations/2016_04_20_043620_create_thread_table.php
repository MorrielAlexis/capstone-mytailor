<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMaterialThread', function (Blueprint $table) {
            $table->string('strMaterialThreadID')->primary();
            $table->string('strMaterialThreadBrand');
            $table->string('strMaterialThreadColor');
            $table->string('strMaterialThreadDesc')->nullable();
            $table->string('strMaterialThreadImage')->nullable();
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
        Schema::drop('tblMaterialThread');
    }
}
