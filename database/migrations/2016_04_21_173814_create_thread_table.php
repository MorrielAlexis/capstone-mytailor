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
        Schema::create('tblThread', function (Blueprint $table) {
            $table->increments('intThreadID');
            $table->string('strThreadBrand');
            $table->string('strThreadColor');
            $table->string('strThreadDesc')->nullable();
            $table->string('strThreadImage')->nullable();
            $table->string('strThreadInactiveReason');
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
        Schema::drop('tblThread');
    }
}
