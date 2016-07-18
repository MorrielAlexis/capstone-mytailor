<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMeasurementCategory', function (Blueprint $table) {
            $table->string('strMeasurementCategoryID')->primary();
            $table->string('strMeasurementCategoryName');
            $table->text('txtMeasurementCategoryDesc')->nullable();
            $table->string('strMeasCatInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblMeasurementCategory');
    }
}
