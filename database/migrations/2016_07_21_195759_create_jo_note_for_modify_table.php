<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoNoteForModifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblJONoteForModify', function (Blueprint $table) {
            $table->string('strJobOrderIDFK')->index();
            $table->text('txtUpdateNote');
            $table->primary('strJobOrderIDFK');
            $table->timestamps();

            $table->foreign('strJobOrderIDFK')
                  ->references('strJobOrderID')
                  ->on('tblJobOrder');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblJONoteForModify');
    }
}
