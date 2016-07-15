<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFabrics', function (Blueprint $table) {
            $table->string('strFabricID')->primary();   
            $table->string('strFabricTypeFK')->index();//fk
            $table->string('strFabricPatternFK')->index();//fk
            $table->string('strFabricColorFK')->index();//fk
            $table->string('strFabricThreadCountFK')->index();//fk
            $table->string('strFabricName');
            $table->double('dblFabricPrice');
            $table->string('strFabricCode');
            $table->string('strFabricImage')->nullable();
            $table->string('strFabricDesc')->nullable();
            $table->string('strFabricInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strFabricTypeFK')
                  ->references('strFabricTypeID')
                  ->on('tblFabricType');
                  
            $table->foreign('strFabricPatternFK')
                  ->references('strFabricPatternID')
                  ->on('tblFabricPattern');

            $table->foreign('strFabricColorFK')
                  ->references('strFabricColorID')
                  ->on('tblFabricColor');

            $table->foreign('strFabricThreadCountFK')
                  ->references('strThreadCountID')
                  ->on('tblThreadCount');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblFabrics');
    }
}
