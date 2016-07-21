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
            $table->string('strJOSpecificsGarmentFK')->index();
            $table->string('strJOSpecificsSegmentFK')->index();
            $table->string('strJOSpecificsFabricFK')->index();
            $table->integer('intQuantity');
            $table->double('dblUnitPrice');
            $table->double('dblEstimatedDaystoFinish');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJOSpecificsGarmentFK')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');

            $table->foreign('strJOSpecificsSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');


            $table->foreign('strJOSpecificsFabricFK')
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
