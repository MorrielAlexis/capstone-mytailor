<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmployee_Role', function (Blueprint $table) {
            $table->string('strEmpID')->index();
            $table->foreign('strEmpID')->references('strEmployeeID')->on('tblEmployee');
            $table->string('strEmpRoleID')->index();
            $table->foreign('strEmpRoleID')->references('strRoleID')->on('tblRole');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblEmployee_Role');
    }
}
