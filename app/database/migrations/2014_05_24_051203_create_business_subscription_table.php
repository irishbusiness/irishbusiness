<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessSubscriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business_subscription', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('business_id')->unsigned()->index();
			$table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
			$table->integer('subscription_id')->unsigned()->index();
			$table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
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
		Schema::drop('business_subscription');
	}

}
