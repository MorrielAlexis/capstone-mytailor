<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSwatch', function (Blueprint $table) {
            $table->string('strSwatchID')->primary();
            $table->string('strSwatchTypeFK')->index();//fk
            $table->string('strSwatchNameFK')->index();//fk
            $table->string('strSwatchCode');
            $table->string('strSwatchImage')->nullable();
            $table->string('strSwatchInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strSwatchTypeFK')
                  ->references('strFabricTypeID')
                  ->on('tblFabricType');
                  
             $table->foreign('strSwatchNameFK')
                  ->references('strSwatchNameID')
                  ->on('tblSwatchName');
 


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblSwatch');
    }
}
