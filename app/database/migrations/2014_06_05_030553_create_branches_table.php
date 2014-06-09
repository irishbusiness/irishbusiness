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
			$table->string('website');
			$table->string('email');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('google');
			$table->string('linkedin');
			$table->string('latlng')->default('(53.270559,-9.056668)');
			$table->string('branchslug')->unique();
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
