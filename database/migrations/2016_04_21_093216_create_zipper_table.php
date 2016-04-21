<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMaterialZipper', function (Blueprint $table) {
            $table->string('strMaterialZipperID')->primary();
            $table->string('strMaterialZipperBrand');
            $table->string('strMaterialZipperSize');
            $table->string('strMaterialZipperColor');
            $table->text('txtMaterialZipperDesc')->nullable();
            $table->string('strMaterialZipperImage')->nullable();
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
        Schema::drop('tblMaterialZipper');
    }
}
