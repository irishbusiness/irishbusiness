<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('price');
			$table->string('duration')->default('monthly');
			$table->integer('blogs_limit')->default(3);
			$table->integer('max_location')->default(3);
			$table->integer('max_categories')->default(3);
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
		Schema::drop('subscriptions');
	}

}
