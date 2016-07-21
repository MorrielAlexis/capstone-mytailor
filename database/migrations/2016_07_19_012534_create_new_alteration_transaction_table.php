<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAlterationTransactionTable extends Migration
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
            $table->string('strAlteSegmentFK')->index(); 
            $table->string('strAlterationTypeFK')->index(); 
            $table->double('dblAlterationPrice');
            // $table->string('strAltericeQuoteFK')->index(); 
            $table->integer('intAlteQty');
            $table->date('dtAlteDate');
            $table->text('txtAlteNotes');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustomerIndFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');
                  
            $table->foreign('strAlteSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strAlterationTypeFK')
                  ->references('strAlterationID')
                  ->on('tblAlteration');

             // $table->foreign('strAltericeQuoteFK')
             //      ->references('strJOPriceQuoteID')
             //      ->on('tblJOPriceQuotation');
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
