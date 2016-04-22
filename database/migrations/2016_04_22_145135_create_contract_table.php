<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblContract', function (Blueprint $table) {
            $table->string('strContractID')->primary();
            $table->string('strCustomerID')->index();//fk
            $table->datetime('dtDateIssued');
            $table->string('strApprovedBy');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustomerID')
                  ->references('strCustID')
                  ->on('tblCustomer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblContract');
    }
}
