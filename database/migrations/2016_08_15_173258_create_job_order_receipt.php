<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJobOrderReceipt', function(Blueprint $table) {
            $table->string('strOrderReceiptID')->primary;
            $table->string('strJobOrderFK'); //fk
            $table->string('strIssuedByEmpNameFK'); //fk
            $table->boolean('boolIsActive');
            $table->string('strOrderRecInactiveReason')->nullable();
            $table->timestamps();


            $table->foreign('strJobOrderFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

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
        Schema::drop('tblJobOrderReceipt');
    }

}
