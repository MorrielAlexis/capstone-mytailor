<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderIndividual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJobOrderIndividual', function (Blueprint $table) {
            $table->string('strJobOrderIndID')->primary();
            $table->string('strJOI_CustomerFK')->index();
            $table->string('strJOI_OrderDetailsFK')->index();
            $table->string('strJOI_PriceQuotation')->index();
            $table->string('strTermsOfPayment');
            $table->string('strModeOfPayment');
            $table->integer('intJO_ItemQty');
            $table->boolean('boolisOrderAccepted');
            $table->date('dtOrderDate')->nullable();
            $table->date('dtOrderApproved')->nullable();
            $table->date('dtOrderExpectedToBeDone')->nullable();
            $table->date('dtExpectedDeliveryDate')->nullable();
            $table->date('dtFinished')->nullable();
            $table->date('dtDelivered')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();


            $table->foreign('strJOI_CustomerFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            $table->foreign('strJOI_OrderDetailsFK')
                  ->references('strJOSpecificsID')
                  ->on('tblJOSpecificsInd');

            $table->foreign('strJOI_PriceQuotation')
                  ->references('strJOPriceQuoteID')
                  ->on('tblJOPriceQuotation');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJobOrderIndividual');
    }
}
