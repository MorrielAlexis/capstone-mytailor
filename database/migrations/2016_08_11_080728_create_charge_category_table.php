<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblChargeCategory', function (Blueprint $table) {
            $table->string('strChargeCatID')->primary();
            $table->string('strChargeCatName');
            $table->text('txtChargeDesc')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strChargeCatInactiveReason')->nullable();
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
        Schema::drop('tblChargeCategory');
    }
}
