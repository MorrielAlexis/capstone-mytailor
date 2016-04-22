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
            $table->string('strJobOrderidFK')->index();//fk
            $table->double('dblAmountPaid');
            $table->boolean('boolIsPaid');
            $table->datetime('dtPaymentDate');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderidFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

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
