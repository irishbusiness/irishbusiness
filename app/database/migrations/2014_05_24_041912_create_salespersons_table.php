<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalespersonsTable extends Migration {

	public function up()
	{
		Schema::create('salespersons', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('coupon')->unique();
            $table->string('phone');
            $table->integer('access_level')->unsigned();
            $table->string('remember_token')->nullable();
            $table->integer('tl')->unsigned(); //teamleader id
            $table->integer('st')->unsigned()->default(0); //sales team id
			$table->timestamps();
			$table->foreign('access_level')->references('id')->on('commissions')->onUpdate('cascade')->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('salespersons');
	}

}
