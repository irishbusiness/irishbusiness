<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalespersonlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salespersonlogs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('salesperson_id')->unsigned()->index();
			$table->integer('promoter_id')->unsigned()->index();
			$table->string('log');
            $table->foreign('salesperson_id')->references('id')->on('salespersons')->onDelete('cascade');
            $table->foreign('promoter_id')->references('id')->on('salespersons')->onDelete('cascade');
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
		Schema::drop('salespersonlogs');
	}

}
