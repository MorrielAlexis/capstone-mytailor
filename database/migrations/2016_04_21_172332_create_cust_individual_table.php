  <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustIndividual', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('strIndivID')->primary();
            $table->string('strIndivFName');
            $table->string('strIndivLName');
            $table->string('strIndivMName')->nullable();
            $table->string('strIndivGender');
            $table->string('strIndivHouseNo');
            $table->string('strIndivStreet');
            $table->string('strIndivBarangay')->nullable();
            $table->string('strIndivCity');
            $table->string('strIndivProvince')->nullable();
            $table->string('strIndivZipCode')->nullable();
            $table->string('strIndivLandlineNumber')->nullable();
            $table->string('strIndivCPNumber');      
            $table->string('strIndivCPNumberAlt')->nullable();   
            $table->string('strIndivEmailAddress')->unique();
            $table->string('strIndivInactiveReason')->nullable();
            $table->string('userId')->index()->nullable();
            $table->boolean('boolIsActive');
            $table->timestamps();
        });

        Schema::table('tblCustIndividual', function (Blueprint $table){
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCustIndividual');
        Schema::table('tblCustIndividual', function ($table){
            $table->dropColumn('userId');
        });
    }
}
