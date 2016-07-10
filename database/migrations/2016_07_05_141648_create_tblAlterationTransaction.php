<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAlterationTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAlterationTransaction', function (Blueprint $table) {
            $table->string('strAltTransacID')->primary();
            $table->string('strAltTransacSegFK')->index();
            $table->string('strAltTransacAltTypeFK')->index();
            $table->string('strAltTransacCustomeridFK')->index(); 
            $table->text('txtAltTransacDesc');
            $table->double('dblAltTransacPrice');
            $table->integer('intAltTransacMinDays');
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
        Schema::drop('tblAlterationTransaction');
    }
}
