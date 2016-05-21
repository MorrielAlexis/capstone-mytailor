<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatchnameMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSwatchName', function (Blueprint $table) {
            $table->string('strSwatchNameID')->primary();
            $table->string('strSName');
            $table->text('txtSwatchNameDesc');
            $table->text('strSwatchNameInactiveReason')->nullable()->default(null);
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
        Schema::drop('tblSwatchName');
    }
}
