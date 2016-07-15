<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentStyleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSegmentStyleCategory', function (Blueprint $table) {
            $table->string('strSegStyleCatID')->primary();
            $table->string('strSegmentFK')->index();
            $table->string('strSegStyleName');
            $table->string('strSegStyleCatDesc')->nullable();
            $table->string('strSegStyleCatInactiveReason')->nullable()->default(null);
            $table->boolean('boolIsActive');
            $table->timestamps();


            $table->foreign('strSegmentFK')
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
        Schema::drop('tblSegmentStyleCategory');
    }
}
