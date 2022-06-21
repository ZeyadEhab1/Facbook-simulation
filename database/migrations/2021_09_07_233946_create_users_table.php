<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 255);
			$table->string('password', 255);
			$table->string('fname', 255);
			$table->string('lname', 255);
			$table->string('email', 255);
			$table->string('image', 1000)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}