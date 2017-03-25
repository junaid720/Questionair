<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('question_option', function(Blueprint $table)
		{
			$table->foreign('question_id', 'fk_question_option_question1')->references('id')->on('question')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('question_option', function(Blueprint $table)
		{
			$table->dropForeign('fk_question_option_question1');
		});
	}

}
