<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoborderGarmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJO_Garment', function (Blueprint $table) {
            $table->string('strJobOrderID')->index();//fk
            $table->string('strJOCategoryID')->index();//fk
            $table->string('strJOSegmentID')->index();//fk
            $table->primary('strJobOrderID', 'strJOCategoryID', 'strJOSegmentID');//primary keys
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderID')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');
            $table->foreign('strJOCategoryID')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');
            $table->foreign('strJOSegmentID')
                  ->references('strSegmentID')
                  ->on('tblSegment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJO_Garment');
    }
}
