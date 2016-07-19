<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyPartsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBodyPartForms', function (Blueprint $table) {
            $table->string('strBodyFormID')->primary();
            $table->string('strBodyPartFK');
            $table->string('strBodyFormName');
            $table->string('strBodyFormImage')->nullable();
            $table->text('txtBodyFormDesc')->nullable();
            $table->string('strBodyFormInactiveReason')->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strBodyPartFK')
                  ->references('strBodyPartCategoryID')
                  ->on('tblBodyPartCategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblBodyPartForms');
    }
}
