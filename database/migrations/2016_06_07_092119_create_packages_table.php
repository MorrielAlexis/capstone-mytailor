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
            $table->string('strPackageSex');
            $table->string('strPackageSeg1FK')->index();//fk
            $table->string('strPackageSeg2FK')->index();//fk
            $table->string('strPackageSeg3FK')->index()->nullable();//fk
            // $table->string('strPackageSeg4FK')->index()->nullable();//fk
            // $table->string('strPackageSeg5FK')->index()->nullable();//fk
            $table->double('dblPackagePrice');
            $table->string('strPackageImage');
            $table->integer('intPackageMinDays');
            $table->string('strPackageDesc')->nullable();
            $table->boolean('boolIsActive');
            $table->string('strPackageInactiveReason')->nullable();
            $table->timestamps();

            //foreign
            $table->foreign('strPackageSeg1FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackageSeg2FK')->references('strSegmentID')->on('tblSegment');
            $table->foreign('strPackageSeg3FK')->references('strSegmentID')->on('tblSegment');
            // $table->foreign('strPackageSeg4FK')->references('strSegmentID')->on('tblSegment');
            // $table->foreign('strPackageSeg5FK')->references('strSegmentID')->on('tblSegment');

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
