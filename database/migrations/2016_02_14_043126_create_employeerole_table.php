<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEmployeeRole', function(Blueprint $table){
			$table->string('strEmpRoleID')->primary();
			$table->string('strEmpRoleName');
			$table->text('strEmpRoleDesc')->nullable();
			$table->string('strRoleInactiveReason')->nullable();
			$table->timestamps();
			$table->boolean('boolIsActive');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblEmployeeRole');
	}

}
