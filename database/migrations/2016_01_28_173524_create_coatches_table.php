<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coatches', function(Blueprint $table) {
            $table->increments('id');
            $table->string('IMIE');
            $table->string('NAZWISKO');
            $table->string('LICENCJA_TRENERA_NAZWA');
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
		Schema::drop('coatches');
	}

}
