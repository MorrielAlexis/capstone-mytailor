<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblEmployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('tblEmployee', function(Blueprint $table){
			$table->string('strEmployeeID')->primary();
			$table->string('strEmpFName');
			$table->string('strEmpMName')->nullable()->change();
			$table->string('strEmpLName');
			$table->date('dtEmpBday');
			$table->string('strSex');
			$table->string('strEmpHouseNo');
			$table->string('strEmpStreet');
			$table->string('strEmpBarangay')->nullable()->change();
			$table->string('strEmpCity');
			$table->string('strEmpProvince');
			$table->string('strEmpZipCode');
			$table->string('strRole')->index();//fk
			$table->string('strCellNo');
			$table->string('strCellNoAlt')->nullable();
			$table->string('strPhoneNo')->nullable()->change();
			$table->string('strEmailAdd')->nullable()->change();
			$table->boolean('boolIsActive');
			//$table->datetime('dtUpdatedAt');
			$table->timestamps();
		});


		Schema::table('tblEmployee', function(Blueprint $table){

			$table->foreign('strRole')->references('strEmpRoleID')->on('tblEmployeeRole');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblEmployee');

		Schema::table('tblEmployee', function($table){
			$table->dropColumn('strRole');
		});
	}

}
