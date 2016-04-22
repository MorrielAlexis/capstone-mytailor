<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCatalogue', function (Blueprint $table) {
            $table->string('strCatalogueID')->primary();
            $table->string('strCatalogueCategoryFK')->index();
            $table->string('strCatalogueName');
            $table->string('strCatalogueDesc', 255)->nullable();
            $table->string('strCatalogueImage')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strCatalogueInactiveReason');
            $table->timestamps();

            //foreign constraint
            $table->foreign('strCatalogueCategoryFK')->references('strGarmentCategoryID')->on('tblGarmentCategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCatalogue');
    }
}
