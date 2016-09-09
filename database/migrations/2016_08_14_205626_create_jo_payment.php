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
            $table->string('strTransactionFK')->index()->nullable();
            $table->string('strNonShopTransacAlterFk')->index()->nullable();
            $table->string('strShopTransacAlterFk')->index()->nullable();
            $table->double('dblAmountToPay');
            $table->double('dblOutstandingBal');
            $table->double('dblAmountTendered');
            $table->double('dblAmountChange');
            $table->string('strReceivedByEmployeeNameFK')->index();
            $table->date('dtPaymentDate');
            $table->date('dtPaymentDueDate');
            $table->string('strPaymentStatus');
            $table->string('strAdditionalChargeFK')->index()->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strTransactionFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

            $table->foreign('strNonShopTransacAlterFk')
                  ->references('strNonShopAlterID')
                  ->on('tblNonShopAlteration');


            $table->foreign('strShopTransacAlterFk')
                  ->references('strJOAlterationID')
                  ->on('tblJOAlteration');

            $table->foreign('strReceivedByEmployeeNameFK')
                 ->references('strEmployeeID')
                 ->on('tblEmployee');


            $table->foreign('strAdditionalChargeFK')
                 ->references('strChargeDetailID')
                 ->on('tblChargeDetail');


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
