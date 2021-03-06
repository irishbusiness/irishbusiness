<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('stripe_id');
			$table->string('firstname');
			$table->string('lastname');
			$table->boolean('confirmed')->default(0);
			$table->string('email')->unique();
			$table->string('password');
			$table->string('coupon')->nullable();
            $table->string('phone');
            $table->integer('access_level')->default(1);
            $table->string('remember_token')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
