<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMainSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('main_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string("headerlogo");
			$table->string("footerlogo");
			$table->string('domain_name');
			$table->string('admin_email');
			$table->integer("search_result_per_page");
			$table->boolean('view_statistics')->default(1);
			$table->string('analytics_code');
			$table->string('footer_text');
			$table->boolean('allow_statistics')->default(1);
			$table->boolean('reviews_approval')->default(0);
			$table->double('tax')->default(null);
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
		Schema::drop('main_settings');
	}

}
