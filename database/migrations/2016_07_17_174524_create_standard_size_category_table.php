<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardSizeCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblStandardSizeCategory', function (Blueprint $table) {
            $table->string('strStandardSizeCategoryID')->primary();
            $table->string('strStandardSizeCategoryName');
            $table->text('txtStandardSizeCategoryDesc')->nullable();
            $table->string('strStandardSizeCategoryInactiveReason')->nullable();
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
        Schema::drop('tblStandardSizeCategory');
    }
}
