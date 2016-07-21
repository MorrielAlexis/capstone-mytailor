<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoSpecificsCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJOSpecificsCompany', function (Blueprint $table) {
            $table->string('strJOCSpecificsID')->primary();
            $table->string('strJobOrderFK')->index();
            $table->string('strPackageFK')->index();
            $table->string('strSetGender');
            $table->integer('intSetQuantity');
            $table->double('dblUnitPrice');
            $table->double('dblEstimatedDaystoFinish');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strJobOrderFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');

            $table->foreign('strPackageFK')
                  ->references('strPackageID')
                  ->on('tblPackages');


          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJOSpecificsCompany');
    }
}
