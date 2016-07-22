<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonShopAlterationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNonShopAlteration', function (Blueprint $table) {
            $table->string('strNonShopAlterID')->primary();
            $table->string('strCustIndFK')->index()->nullable();
            $table->string('strCustCompFK')->index()->nullable();
            $table->double('dblOrderTotalPrice');
            $table->date('dtAlteration');

            $table->foreign('strCustIndFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            $table->foreign('strCustCompFK')
                  ->references('strCompanyID')
                  ->on('tblCustCompany');


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
        Schema::drop('tblNonShopAlteration');
    }
}
