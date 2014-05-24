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
			$table->string('coupon')->unique();
            $table->string('phone');
            $table->string('access_level');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('salespersons');
	}

}
