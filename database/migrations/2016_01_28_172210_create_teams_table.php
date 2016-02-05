<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEAMSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_e_a_ms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NAZWA');
            $table->integer('TRENER_ID_TRENER');
            $table->integer('BUDZET');
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
		Schema::drop('t_e_a_ms');
	}

}
