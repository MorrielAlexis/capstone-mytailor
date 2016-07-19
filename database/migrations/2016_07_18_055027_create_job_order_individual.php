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
            $table->boolean('boolIsOrderAccepted');
            $table->date('dtOrderDate');
            $table->date('dtOrderApproved');
            $table->date('dtOrderExpectedToBeDone');
            $table->date('dtExpectedDeliveryDate');
            $table->date('dtFinished');
            $table->date('dtDelivered');
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
