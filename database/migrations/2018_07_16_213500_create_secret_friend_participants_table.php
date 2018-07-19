<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretFriendParticipantsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('secret_friend_participants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cinema');
            $table->string('address');
            $table->time('time_session');
            $table ->integer('secret_friend_id')->unsigned();
            $table->foreign('secret_friend_id')->references('id')->on('secret_friends');

            $table ->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participants');
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
		Schema::drop('secret_friend_participants');
	}

}
