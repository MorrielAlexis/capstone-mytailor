<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPayment', function (Blueprint $table) {
            $table->string('strPaymentID')->primary();
            $table->string('strCustomerIdFK')->index();//fk
            $table->date('dtTransacDate');
            $table->double('dblAmtPayable');
            $table->double('dblOustandingBal');
            $table->date('dtDueDate');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustomerIdFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblPayment');
    }
}
