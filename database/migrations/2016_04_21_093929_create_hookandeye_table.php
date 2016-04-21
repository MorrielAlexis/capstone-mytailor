<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookandeyeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMaterialHookandEye', function (Blueprint $table) {
            $table->string('strMaterialHookID')->primary();
            $table->string('strMaterialHookBrand');
            $table->string('strMaterialHookSize');
            $table->string('strMaterialHookColor');
            $table->string('strMaterialHookImage')->nullable();
            $table->text('textMaterialHookDesc')->nullable();
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
        Schema::drop('tblMaterialHookandEye');
    }
}
