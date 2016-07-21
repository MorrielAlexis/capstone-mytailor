<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoProgressInd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOProgressInd', function (Blueprint $table) {
            $table->string('strJobOrderIDFk')->index();
            $table->string('strJoSpecificsFk')->index();
            $table->boolean('boolFinished');
            $table->date('dtUpdateAsOf')->nullable();
            $table->primary('strJobOrderIDFk');
            $table->timestamps();


            $table->foreign('strJoSpecificsFk')
                  ->references('strJOSpecificsID')
                  ->on('tblJOSpecificsInd');
  
            $table->foreign('strJobOrderIDFk')
                  ->references('strJobOrderIndID')
                  ->on('tblJobOrderIndividual');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOProgressInd');
    }
}
