<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAlterPaymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNewAlterPaymentStatus', function (Blueprint $table) {
            $table->string('strPaymentFk')->index();
            $table->string('strNewAlterPaymentStatus');
            $table->string('strNewAlterationTransFk');
            $table->timestamps();
            $table->primary('strPaymentFk');


            $table->foreign('strPaymentFk')
                  ->references('strPaymentID')
                  ->on('tblPayment');

                  
            $table->foreign('strNewAlterationTransFk')
                  ->references('strNewAlterationID')
                  ->on('tblNewAlteration');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblNewAlterPaymentStatus');
    }
}
