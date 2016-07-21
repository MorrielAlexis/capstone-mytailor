<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAlterationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNewAlterationDetail', function (Blueprint $table) {
            $table->string('strNewAlterationDetailID')->primary();
            $table->string('strNewAlterationIDFk')->index();
            $table->string('strAlteSegmentFk')->index(); 
            $table->string('strAlterationTypeFk')->index(); 
            $table->double('dblAlterationPrice'); 
            $table->text('txtAlteNotes');
            $table->boolean('boolIsActive');
            $table->timestamps();

        
            $table->foreign('strNewAlterationIDFk')
                  ->references('strNewAlterationID')
                  ->on('tblNewAlteration');

                  
            $table->foreign('strAlteSegmentFk')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strAlterationTypeFk')
                  ->references('strAlterationID')
                  ->on('tblAlteration');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblNewAlterationDetail');
    }
}
