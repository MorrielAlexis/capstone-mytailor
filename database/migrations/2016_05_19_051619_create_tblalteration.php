<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblalteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAlterationMaintenance', function (Blueprint $table) {
            $table->string('strAlterationID')->primary();
            $table->string('strAlterationName');
            $table->text('txtAlterationDesc')->nullable();
            $table->string('strAlterationPrice');
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
        Schema::drop('tblAlterationMaintenance');
    }
}
