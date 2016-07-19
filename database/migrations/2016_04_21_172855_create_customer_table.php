<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustomer', function (Blueprint $table) {
            $table->string('strCustomerID');
            $table->string('strCustomer_IndFK')->index();
            $table->string('strCustomer_CompanyFK')->index();
            $table->string('strCustomerAccountIDFK')->index();
            $table->primary('strCustomer_IndFK','strCustomer_CompanyFK'); //primary key
            $table->boolean('boolIsActive');
            $table->string('strCustInactiveReason');
            $table->timestamps();

            $table->foreign('strCustomer_IndFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');

            $table->foreign('strCustomer_CompanyFK')
                  ->references('strCompanyID')
                  ->on('tblCustCompany');


            $table->foreign('strCustomerAccountIDFK')
                  ->references('id')
                  ->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCustomer');
    }
}
