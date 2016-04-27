<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSegment', function (Blueprint $table) {
            $table->string('strSegmentID')->primary();
            $table->string('strSegCategoryFK');//fk
            $table->string('strSegmentName');
            $table->text('textSegmentDesc')->nullable();
            $table->string('strSegInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strSegCategoryFK')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblSegment');
    }
}
