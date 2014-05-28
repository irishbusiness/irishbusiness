<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialmediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('socialmedia', function(Blueprint $table) {
			$table->increments('id');
			$table->string('facebook');
			$table->string('google');
		    $table->string('twitter');
            $table->string('linkedin');
            $table->string('pinterest');
			$table->string('dribbble');
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
		Schema::drop('socialmedia');
	}

}
