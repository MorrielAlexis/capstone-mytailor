<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoPaymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJO_PaymentStatus', function (Blueprint $table) {
            $table->string('strJobOrderIndIDFK')->index();
            $table->string('strPaymentIDFK')->index();
            $table->string('strStatus');
            $table->timestamps();
            $table->primary('strJobOrderIndIDFK', 'strPaymentIDFK');

            $table->foreign('strJobOrderIndIDFK')
                  ->references('strJobOrderIndID')
                  ->on('tblJobOrderIndividual');

            $table->foreign('strPaymentIDFK')
                  ->references('strPaymentID')
                  ->on('tblPayment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJO_PaymentStatus');
    }
}
