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
			$table->string('duration')->default('monthly');
			$table->string('currency');
			$table->double('price');
			$table->double('discounted_price');
			$table->integer('blogs_limit')->default(3);
			$table->integer('max_location')->default(3);
			$table->integer('max_categories')->default(3);
			$table->boolean("is_deleted")->default(false);
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
