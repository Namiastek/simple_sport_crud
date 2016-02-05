<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('championships', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NAZWA');
            $table->integer('ZA_ZWYCIESTWO');
            $table->integer('ZA_REMIS');
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
		Schema::drop('championships');
	}

}
