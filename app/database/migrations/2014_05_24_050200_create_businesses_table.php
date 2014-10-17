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
			$table->string('keywords');
			$table->string('additional_keywords')->nullable();
			/*$table->string('locations');
			$table->string('phone');
			$table->string('website');
			$table->string('email')->unique();*/
			$table->softDeletes();
			$table->string('logo');
			$table->text('business_description');
			$table->text('profile_description');
			$table->string('slug')->unique();
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
