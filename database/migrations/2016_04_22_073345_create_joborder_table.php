<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoborderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJobOrder', function (Blueprint $table) {
            $table->string('strJobOrderID')->primary();
            $table->string('strJobDescIDFK')->index();//fk
            $table->string('strCustomerIDFK')->index();//fk
            $table->string('strTermsPaymentIDFK')->index();//fk
            $table->string('strCustomerType');
            $table->integer('intOrderQuantity');
            $table->datetime('dtOrderDate');
            $table->datetime('dtRequiredDate');
            $table->datetime('dtDeliveryDate');
            $table->boolean('boolIsFinished');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobDescIDFK')
                  ->references('strJobDescriptionID')
                  ->on('tblJobDescription');
            $table->foreign('strCustomerIDFK')
                  ->references('strCustID')
                  ->on('tblCustomer');
            $table->foreign('strTermsPaymentIDFK')
                  ->references('strTermsOfPaymentID')
                  ->on('tblTermsOfPayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJobOrder');
    }
}
