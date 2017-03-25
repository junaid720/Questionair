<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_option', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('option_name')->nullable();
			$table->integer('check_option')->nullable();
			$table->integer('question_id')->index('fk_question_option_question1_idx');
			$table->dateTime('timestamp');
			$table->primary(['id','question_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_option');
	}

}
