<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificSegmentPattern extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificSegmentPattern', function (Blueprint $table) {
            $table->increments('intJOSpecSegmentPatternID');
            $table->string('strJobOrderSpecificFK')->index();
            $table->string('strSegmentPatternFK')->index();
            $table->string('strPatternFabricFK')->index();
            //$table->primary('strJobOrderSpecificFK');
            $table->timestamps();

            $table->foreign('strJobOrderSpecificFK')
                  ->references('strJOSpecificID')
                  ->on('tblJOSpecific');

            $table->foreign('strSegmentPatternFK')
                  ->references('strSegPatternID')
                  ->on('tblSegmentPattern');

            $table->foreign('strPatternFabricFK')
                  ->references('strFabricID')
                  ->on('tblFabric');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOSpecificSegmentPattern');
    }
}
