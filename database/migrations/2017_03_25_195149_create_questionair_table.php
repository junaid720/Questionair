<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionairTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionair', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('questionair_name', 100)->nullable();
			$table->string('duration', 45)->nullable();
			$table->integer('can_resume')->nullable();
			$table->dateTime('timestamp')->nullable();
			$table->integer('user_id')->index('fk_questionair_user1_idx');
			$table->primary(['id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questionair');
	}

}
