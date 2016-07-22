<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJobOrderProgress', function (Blueprint $table) {
            $table->string('strJobOrderProgressID')->primary();
            $table->string('strJobOrderSpecificFK')->index();
            $table->integer('intProgressAmount');
            $table->date('dtProgressDate');
            $table->timestamps();

            $table->foreign('strJobOrderSpecificFK')
                  ->references('strJOSpecificID')
                  ->on('tblJOSpecific');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJobOrderProgress');
    }
}
