<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilitiesGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUtilitiesGeneral', function (Blueprint $table) {
            $table->increments('intUtilsGenID');
            $table->string('strShopName');
            $table->string('strShopImage')->nullable();
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
        Schema::drop('tblUtilitiesGeneral');
    }
}
