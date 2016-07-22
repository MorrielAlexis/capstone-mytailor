<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAlterationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNewAlteration', function (Blueprint $table) {
            $table->string('strNewAlterationID')->primary();
            $table->string('strCustomerIndFK')->index();
            $table->integer('intAlteQty');
            $table->date('dtAlteDate');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustomerIndFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');
                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblAlterationTransaction');
    }
}
