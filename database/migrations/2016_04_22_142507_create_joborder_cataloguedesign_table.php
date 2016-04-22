<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoborderCataloguedesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJobOrder_CatalogueDesign', function (Blueprint $table) {
            $table->string('strJobOrderID')->index();//fk
            $table->string('strCatDesignID')->index();//fk
            $table->primary('strJobOrderID', 'strCatDesignID');//primary keys
            $table->boolean('boolIsActive');     
            $table->timestamps();

            $table->foreign('strJobOrderID')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');
            $table->foreign('strCatDesignID')
                  ->references('strCatalogueID')
                  ->on('tblCatalogue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJobOrder_CatalogueDesign');
    }
}
