<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabrictypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFabricType', function (Blueprint $table) {
            $table->string('strFabricTypeID')->primary();
            $table->string('strFabricTypeName');
            $table->text('txtFabricTypeDesc')->nullable();
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
        Schema::drop('tblFabricType');
    }
}
