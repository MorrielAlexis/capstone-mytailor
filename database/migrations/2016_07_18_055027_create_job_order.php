<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrder extends Migration
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
            $table->string('strJO_CustomerFK')->index();
            // $table->string('strJO_OrderDetailsFK')->index();
            // $table->string('strJO_PriceQuotation')->index();
            $table->string('strTermsOfPayment');
            $table->string('strModeOfPayment');
            $table->integer('intJO_ItemQty');
            $table->boolean('boolIsOrderAccepted');
            $table->date('dtOrderDate')->nullable();
            $table->date('dtOrderApproved')->nullable();
            $table->date('dtOrderExpectedToBeDone')->nullable();
            $table->date('dtExpectedDeliveryDate')->nullable();
            $table->date('dtFinished')->nullable();
            $table->date('dtDelivered')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJO_CustomerFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            // $table->foreign('strJOI_OrderDetailsFK')
            //       ->references('strJOSpecificsID')
            //       ->on('tblJOSpecificsInd');

            // $table->foreign('strJO_PriceQuotation')
            //       ->references('strJOPriceQuoteID')
            //       ->on('tblJOPriceQuotation');


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
