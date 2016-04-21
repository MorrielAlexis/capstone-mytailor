<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmproleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmpRole', function (Blueprint $table) {
            $table->string('strEmpRoleID')->primary();
            $table->string('strEmpRoleName');
            $table->string('strEmpRoleDesc', 255)->nullable();
            $table->boolean('boolIsActive');
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
        Schema::drop('tblEmpRole');
    }
}
