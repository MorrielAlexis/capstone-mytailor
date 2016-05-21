<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatchnameMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSwatchName', function (Blueprint $table) {
            $table->string('strSwatchNameID')->primary();
            $table->string('strSwatchNameTypeFK')->index();
            $table->string('strSName');
            $table->text('txtSwatchNameDesc')->nullable();
            $table->text('strSwatchNameInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

             $table->foreign('strSwatchNameTypeFK')
                  ->references('strFabricTypeID')
                  ->on('tblFabricType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblSwatchName');
    }
}
