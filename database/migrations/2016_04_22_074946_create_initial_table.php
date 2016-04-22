<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblInitialPayment', function (Blueprint $table) {
            $table->string('strPaymentidFK')->index();//fk
            $table->string('strPaymentID')->primary();//primary key
            $table->double('dblDownpaymentAmt');
            $table->boolean('boolIsPaid');
            $table->datetime('dtPaymentDate');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strPaymentidFK')
                  ->references('strPaymentID')
                  ->on('tblPayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblInitialPayment');
    }
}
