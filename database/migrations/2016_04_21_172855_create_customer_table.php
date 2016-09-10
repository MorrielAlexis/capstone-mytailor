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
            $table->string('strCustomerID')->primary;
            $table->string('strCustomer_IndFK')->nullable();
            $table->string('strCustomer_CompanyFK')->nullable();
            $table->string('strCustomerAccountIDFK')->nullable();            
            $table->boolean('boolIsActive');
            $table->string('strCustInactiveReason');
            $table->timestamps();


            $table->foreign('strCustomerAccountIDFK')
                  ->references('id')
                  ->on('users');

        });

        Schema::table('tblCustomer', function (Blueprint $table){
            $table->foreign('strCustomer_IndFK')->references('strIndivID')->on('tblCustIndividual');
            $table->foreign('strCustomer_CompanyFK')->references('strCompanyID')->on('tblCustCompany');
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
        Schema::table('tblCustomer', function ($table){
            $table->dropColumn('strCustomer_IndFK');
            $table->dropColumn('strCustomer_CompanyFK');
        });
    }
}
