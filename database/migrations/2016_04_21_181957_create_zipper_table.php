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
        Schema::create('tblZipper', function (Blueprint $table) {
            $table->increments('intZipperID');
             $table->string('strZipperBrand');
            $table->string('strZipperSize');
            $table->string('strZipperColor');
            $table->text('txtZipperDesc')->nullable();
            $table->string('strZipperImage')->nullable();
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
        Schema::drop('tblZipper');
    }
}
