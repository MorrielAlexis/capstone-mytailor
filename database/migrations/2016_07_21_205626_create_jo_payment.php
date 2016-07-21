<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJOPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOPayment', function (Blueprint $table) {
            $table->string('strPaymentID')->primary();
            $table->string('strTransactionFK')->index();//fk
            $table->double('dblAmountTendered');
            $table->double('dblAmountToPay');
            $table->double('dblOustandingBal');
            $table->string('strReceivedByEmployeeNameFK')->index();
            $table->date('dtPaymentDate');
            $table->date('dtPaymentStatus');
            $table->string('strAdditionalChargeFK')->index();
            $table->timestamps();

            $table->foreign('strTransactionFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

            $table->foreign('strReceivedByEmployeeNameFK')
                 ->references('strEmployeeID')
                 ->on('tblEmployee');


            $table->foreign('strAdditionalChargeFK')
                 ->references('strAdditionalChargeID')
                 ->on('tblJOAddCharge');






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
