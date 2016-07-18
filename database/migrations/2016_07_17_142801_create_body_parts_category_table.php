<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyPartsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBodyPartCategory', function (Blueprint $table) {
            $table->string('strBodyPartCategoryID')->primary();
            $table->string('strBodyPartCatName');
            $table->text('textBodyPartCatDesc')->nullable();
            $table->string('strBodyPartCategoryInactiveReason')->nullable();
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
        Schema::drop('tblBodyPartCategory');
    }
}
