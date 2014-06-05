<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('locations');
			$table->string('address');
			$table->string('phone');
			$table->string('mon_fri');
			$table->string('sat');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('google');
			$table->integer('business_id')->unsigned()->index();
			$table->foreign('business_id')->references('id')->on('businesses')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('branches');
	}

}
