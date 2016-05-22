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
        Schema::create('tblButton', function (Blueprint $table) {
            $table->increments('intButtonID');
            $table->string('strButtonBrand');
            $table->string('strButtonSize');
            $table->string('strButtonColor');
            $table->string('strButtonDesc')->nullable();
            $table->string('strButtonImage')->nullable();
            $table->string('strButtonInactiveReason')->nullable();
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
        Schema::drop('tblButton');
    }
}
