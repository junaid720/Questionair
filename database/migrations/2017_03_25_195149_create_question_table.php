<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('questionair_id')->index('fk_question_questionair_idx');
			$table->integer('question_type_id')->index('fk_question_question_tyoe1_idx');
			$table->string('question', 250)->nullable();
			$table->text('answer', 65535)->nullable();
			$table->dateTime('timestamp')->nullable();
			$table->primary(['id','questionair_id','question_type_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question');
	}

}
