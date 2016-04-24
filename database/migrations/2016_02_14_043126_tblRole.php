<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblRole', function(Blueprint $table){
			$table->string('strRoleID')->primary();
			$table->string('strRoleName');
			$table->text('strRoleDesc')->nullable();
			$table->string('strRoleInactiveReason');
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
		Schema::dropIfExists('tblRole');
	}

}
