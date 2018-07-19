<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishListsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wish_lists', function(Blueprint $table) {
            $table->increments('id');
            $table->string('desire',100);

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
		Schema::drop('wish_lists');
	}

}
