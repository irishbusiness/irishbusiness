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
			$table->string('salesperson_email')->nullable();
			$table->string('promoter_email')->nullable();
			$table->string('log');
            $table->foreign('salesperson_email')->references('email')->on('salespersons')->onDelete('cascade');
            $table->foreign('promoter_email')->references('email')->on('salespersons')->onDelete('cascade');
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
