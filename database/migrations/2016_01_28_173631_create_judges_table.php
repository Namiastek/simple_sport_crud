<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('judges', function(Blueprint $table) {
            $table->increments('id');
            $table->string('IMIE');
            $table->string('NAZWISKO');
            $table->date ('DATA_DEBIUTU');
            $table->string('LICENCJA_SEDZIEGO_NAZWA');
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
		Schema::drop('judges');
	}

}
