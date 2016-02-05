<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('SEDZIA_ID');
            $table->string('DRUZYNA_NAZWA1');
            $table->string('DRUZYNA_NAZWA2');
            $table->string('STADION_NAZWA');
            $table->string('ROZGRYWKI_NAZWA');
            $table->date('DATA');
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
		Schema::drop('games');
	}

}
