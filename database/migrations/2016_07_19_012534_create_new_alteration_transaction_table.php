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
            $table->string('strAlteGarmentCategoryFk')->index();
            $table->string('strAlteSegmentFk')->index(); 
            $table->string('strAlterationTypeFk')->index(); 
            $table->string('strAltericeQuoteFK')->index(); 
            $table->integer('intAlteQty');
            $table->date('strAlteDate');
            $table->text('txtAlteNotes');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCustomerIndFK')
                  ->references('strIndivID')
                  ->on('tblCustIndividual');
                  
            $table->foreign('strAlteGarmentCategoryFk')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');

            $table->foreign('strAlteSegmentFk')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strAlterationTypeFk')
                  ->references('strAlterationID')
                  ->on('tblAlteration');

             $table->foreign('strAltericeQuoteFK')
                  ->references('strJOPriceQuoteID')
                  ->on('tblJOPriceQuotation');
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
