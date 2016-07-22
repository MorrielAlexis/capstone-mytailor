<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificAccessory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificAccessory', function (Blueprint $table) {
            $table->string('strJobOrderSpecificFK')->index();
            // $table->string('strAccessoryFK')->index();-->wala pa sa maintenance 
            $table->primary('strJobOrderSpecificFK');
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
        Schema::drop('tblJOSpecificAccessory');
    }
}
