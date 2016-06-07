<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPackages', function (Blueprint $table) {
            $table->string('strPackageID')->primary();
            $table->string('strPackageName');
            $table->string('strPackage-Seg1FK')->index();//fk
            $table->string('strPackage-Seg2FK')->index();//fk
            $table->string('strPackage-Seg3FK')->index();//fk
            $table->string('strPackage-Seg4FK')->index();//fk
            $table->string('strPackage-Seg5FK')->index();//fk
            $table->string('strPackageImage')->index();
            $table->string('strPackageDesc')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strPackageInactiveReason')->nullable();
            $table->timestamps();

            //foreign
            $table->foreign('strPackage-Seg1FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackage-Seg2FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackage-Seg3FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackage-Seg4FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackage-Seg5FK')->references('strSegmentID')->on('tblSegment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblPackages');
    }
}
