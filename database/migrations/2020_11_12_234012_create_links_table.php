<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLinksTable.
 */
class CreateLinksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id');
			$table->string('name');
			$table->string('img');
			$table->decimal('price');
			$table->decimal('price_old')->nullable();
			$table->string('disc')->nullable();
			$table->string('span')->nullable();
			$table->float('stars')->nullable();
			$table->string('link');
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
		Schema::drop('links');
	}
}
