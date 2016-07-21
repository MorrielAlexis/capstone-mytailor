<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoAddcharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOAddCharge', function (Blueprint $table) {
            $table->string('strAdditionalChargeID')->primary();
            $table->string('strAdditionalChargeName');
            $table->double('dblAdditionalChargeAmount');
            $table->text('txtNote');
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
        Schema::drop('tblJOPQAddCharge');
    }
}
