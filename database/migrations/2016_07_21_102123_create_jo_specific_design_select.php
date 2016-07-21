<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificDesignSelect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificDesignSelect', function (Blueprint $table) {
            $table->string('strJobOrderSpecIDFk')->index();
            $table->string('strJobOrderSpecCompanyIDFk')->index();
            $table->string('strStyleCategoryFK')->index();
            $table->string('strSegmentPatternFK')->index();
            $table->primary('strJobOrderSpecIDFk','strStyleCategoryFK');
            $table->timestamps();


            $table->foreign('strJobOrderSpecIDFk')
                  ->references('strJOSpecificsID')
                  ->on('tblJOSpecificsInd');


            $table->foreign('strJobOrderSpecCompanyIDFk')
                  ->references('strJOCSpecificsID')
                  ->on('tblJOSpecificsCompany');


            $table->foreign('strStyleCategoryFK')
                  ->references('strSegStyleCatID')
                  ->on('tblSegmentStyleCategory');

            $table->foreign('strSegmentPatternFK')
                  ->references('strSegPatternID')
                  ->on('tblSegmentPattern');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOSpecificDesignSelect');
    }
}
