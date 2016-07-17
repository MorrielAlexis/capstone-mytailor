<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFabricColor', function (Blueprint $table) {
            $table->string('strFabricColorID')->primary();
            $table->string('strFabricColorName');
            $table->text('txtFabricColorDesc')->nullable();
            $table->string('strFabricColorInactiveReason')->nullable();
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
        Schema::drop('tblFabricColor');
    }
}
