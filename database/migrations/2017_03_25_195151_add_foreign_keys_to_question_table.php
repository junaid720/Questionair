<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->foreign('question_type_id', 'fk_question_question_tyoe1')->references('id')->on('question_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('questionair_id', 'fk_question_questionair')->references('id')->on('questionair')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->dropForeign('fk_question_question_tyoe1');
			$table->dropForeign('fk_question_questionair');
		});
	}

}
