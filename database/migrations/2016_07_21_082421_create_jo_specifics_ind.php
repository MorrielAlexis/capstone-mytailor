<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificsInd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificsInd', function (Blueprint $table) {
            $table->string('strJOSpecificsID')->primary();
            $table->string('strJobOrderFK')->index();
            $table->string('strJOIndSegmentFK')->index();
            $table->string('strJOIndFabricFK')->index();
            $table->text('txtMeasureNote');
            $table->integer('intQuantity');
            $table->double('dblUnitPrice');
            $table->double('dblEstimatedDaystoFinish');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

            $table->foreign('strJOIndSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strJOIndFabricFK')
                  ->references('strFabricID')
                  ->on('tblFabric');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOSpecificsInd');
    }
}
