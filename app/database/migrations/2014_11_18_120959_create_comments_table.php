<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->string('text');
			$table->integer('user_id')->unsigned();
			$table->integer('project_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('comments');
	}

}
