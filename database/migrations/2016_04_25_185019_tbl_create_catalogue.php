<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCreateCatalogue extends Migration
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
            $table->string('strCatalogueCategory');//fk
            $table->string('strCatalogueName');
            $table->text('strCatalogueDesc')->nullable();
            $table->string('strCatalogueImage');
            $table->boolean('boolIsActive');
            $table->timestamps();

            $table->foreign('strCatalogueCategory')
                  ->references('strGarmentCategoryID')
                  ->on('tblGarmentCategory');

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
