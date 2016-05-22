<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarmentcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblGarmentCategory', function (Blueprint $table) {
            $table->string('strGarmentCategoryID')->primary();
            $table->timestamps();
            $table->string('strGarmentCategoryName');
            $table->text('textGarmentCategoryDesc')->nullable();
            $table->string('strGarmentCategoryInactiveReason')->nullable();
            $table->boolean('boolIsActive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblGarmentCategory');
    }
}
