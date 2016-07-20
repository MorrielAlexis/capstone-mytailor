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
        Schema::create('tblFabricThreadCount', function (Blueprint $table) {
            $table->string('strFabricThreadCountID')->primary();
            $table->string('strFabricThreadCountName');
            $table->text('txtFabricThreadCountDesc')->nullable();
            $table->string('strFabricThreadCountInactiveReason')->nullable();
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
        Schema::drop('tblFabricThreadCount');
    }
}
