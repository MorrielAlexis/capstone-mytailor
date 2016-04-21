<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMaterialButton', function (Blueprint $table) {
            $table->string('strMaterialButtonID')->primary();
            $table->string('strMaterialButtonBrand');
            $table->string('strMaterialButtonSize');
            $table->string('strMaterialButtonColor');
            $table->string('strMaterialButtonDesc')->nullable();
            $table->string('strMaterialButtonImage')->nullable();
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
        Schema::drop('tblMaterialButton');
    }
}
