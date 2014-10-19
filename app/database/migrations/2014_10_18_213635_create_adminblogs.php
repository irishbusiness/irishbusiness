<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminblogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adminblogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('blogheaderimage');
			$table->text('body');
            $table->string('facebook');
            $table->string('google');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('slug');
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
		Schema::drop('adminblogs');
	}

}
