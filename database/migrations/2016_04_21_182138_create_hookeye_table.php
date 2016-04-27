<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookeyeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblHookEye', function (Blueprint $table) {
            $table->increments('strHookID');
             $table->string('strHookBrand');
            $table->string('strHookSize');
            $table->string('strHookColor');
            $table->string('strHookImage')->nullable();
            $table->text('textHookDesc')->nullable();
            $table->string('strHookInactiveReason')->nullable();
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
        Schema::drop('tblHookEye');
    }
}
