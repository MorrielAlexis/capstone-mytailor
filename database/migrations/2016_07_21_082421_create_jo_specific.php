<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecific extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecific', function (Blueprint $table) {
            $table->string('strJOSpecificID')->primary();
            $table->string('strJobOrderFK')->index();
            $table->string('strJOSegmentFK')->index();
            $table->string('strJOFabricFK')->index();
            $table->integer('intQuantity');
            $table->double('dblUnitPrice');
            $table->integer('intEstimatedDaystoFinish');
            $table->string('strEmployeeNameFK')->index();
            $table->date('dtDateModified');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

            $table->foreign('strJOSegmentFK')
                  ->references('strSegmentID')
                  ->on('tblSegment');

            $table->foreign('strJOFabricFK')
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
        Schema::drop('tblJOSpecific');
    }
}
