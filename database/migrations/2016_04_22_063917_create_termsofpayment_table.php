<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsofpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTermsofPayment', function (Blueprint $table) {
            $table->string('strTermsOfPaymentID')->primary();
            $table->string('strTOPName');
            $table->text('textTOPDescription');
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
        Schema::drop('tblTermsofPayment');
    }
}
