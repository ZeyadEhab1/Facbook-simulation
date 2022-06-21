<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('friends', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('friends', function(Blueprint $table) {
			$table->foreign('friend_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('friends', function(Blueprint $table) {
			$table->dropForeign('friends_user_id_foreign');
		});
		Schema::table('friends', function(Blueprint $table) {
			$table->dropForeign('friends_friend_id_foreign');
		});
	}
}