<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPaymentReceipt', function(Blueprint $table) {
            $table->string('strPaymentReceiptID')->primary;
            $table->string('strPaymentFK'); //fk
            $table->string('strIssuedByEmpNameFK'); //fk
            $table->boolean('boolIsActive');
            $table->string('strPayRecInactiveReason')->nullable();
            $table->timestamps();


            $table->foreign('strPaymentFK')
                  ->references('strPaymentID')
                  ->on('tblJOPayment');

            $table->foreign('strIssuedByEmpNameFK')
                  ->references('strEmployeeID')
                  ->on('tblEmployee');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblPaymentReceipt');
    }
}
