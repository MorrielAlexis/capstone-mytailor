<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificMaterial', function (Blueprint $table) {
            $table->string('strJOSpecificFK')->index();
            // $table->string('strMaterialFK')->index(); ->wala pang maintenance
            //$table->primary('strJOSpecificFK');
            $table->timestamps();

            $table->foreign('strJOSpecificFK')
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
        Schema::drop('tblJOSpecificMaterial');
    }
}
