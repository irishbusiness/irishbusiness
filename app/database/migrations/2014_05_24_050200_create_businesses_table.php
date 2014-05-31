<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->string('keywords');
			$table->string('locations');
			$table->string('phone');
			$table->string('website');
			$table->string('email')->unique();
			$table->string('logo');
			$table->text('business_description');
			$table->text('profile_description');
			$table->string('mon_fri');
			$table->string('sat');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('google');
			$table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('businesses');
	}

}