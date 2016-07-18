<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoPriceQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOPriceQuotation', function (Blueprint $table) {
            $table->string('strJOPriceQuoteID')->primary();
            $table->double('dblOrderTotalPrice');
            $table->double('dblDownPaymentPrice');
            $table->string('strAddtnlChargeFK');
            $table->double('dblTotalAmnt_withAddCharge');
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
        Schema::drop('tblJOPriceQuotation');
    }
}
