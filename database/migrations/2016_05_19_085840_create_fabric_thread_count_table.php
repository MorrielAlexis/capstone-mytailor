<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricThreadCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblThreadCount', function (Blueprint $table) {
            $table->string('strThreadCountID')->primary();
            $table->string('strThreadCountName');
            $table->text('txtThreadCountDesc')->nullable();
            $table->string('strThreadCountInactiveReason')->nullable();
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
        Schema::drop('tblThreadCount');
    }
}
