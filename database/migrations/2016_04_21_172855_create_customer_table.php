<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustomer', function (Blueprint $table) {
            $table->string('strCustID');
            $table->boolean('boolHasAccount');
            $table->boolean('boolIsActive');
            $table->string('strCustInactiveReason');
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
        Schema::drop('tblCustomer');
    }
}
