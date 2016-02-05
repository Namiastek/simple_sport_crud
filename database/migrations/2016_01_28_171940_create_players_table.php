<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function(Blueprint $table) {
            $table->increments('id');
            $table->string('IMIE');
            $table->string('NAZWISKO');
            $table->integer('POZYCJA_ID_POZYCJA');
            $table->integer('DRUZYNA_ID_DRUZYNA');
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
		Schema::drop('players');
	}

}
