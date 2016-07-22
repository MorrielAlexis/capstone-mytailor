<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoMeasureSpecificTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOMeasureSpecific', function (Blueprint $table) {
            $table->string('strJOMeasureSpecificID')->primary();
            $table->string('strJobOrderSpecificFK')->index();
            $table->string('strMeasureProfileFk')->index();
            $table->string('strMeasureDetailFk')->index()->nullable();
            $table->string('strStandardSizeFK')->index()->nullable();
            $table->double('dblMeasureValue');
            $table->string('strBodyPartFormFK')->index();
            $table->string('strUnitofMeasurement');
            $table->string('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderSpecificFK')
                  ->references('strJOSpecificID')
                  ->on('tblJOSpecific');


            $table->foreign('strMeasureProfileFk')
                  ->references('strJOMeasureProfileID')
                  ->on('tblJo_MeasureProfile');


            $table->foreign('strMeasureDetailFk')
                  ->references('strMeasurementDetailID')
                  ->on('tblMeasurementDetail');

            $table->foreign('strStandardSizeFK')
                  ->references('strStandardSizeDetID')
                  ->on('tblStandardSizeDetail');



            $table->foreign('strBodyPartFormFK')
                  ->references('strBodyFormID')
                  ->on('tblBodyPartForm');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOMeasureSpecific');
    }
}
