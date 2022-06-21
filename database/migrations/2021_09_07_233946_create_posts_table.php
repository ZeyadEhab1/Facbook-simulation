<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('body', 5000)->nullable();
			$table->string('image', 1000)->nullable();
			$table->integer('user_id');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}