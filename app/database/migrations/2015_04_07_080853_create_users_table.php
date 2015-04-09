<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
          	$table->string('name',256)->nullable();
	        $table->string('kana',256)->nullable();
	        $table->string('email',256)->nullable();
            $table->string('telephone_no',256)->nullable();
          	$table->integer('manager_id')->nullable();
          	$table->string('password',256)->nullable();
          	$table->datetime('birthday')->nullable();
          	$table->string('remember_token', 256)->nullable();
          	$table->integer("role_id")->unsigned();
          	$table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
         	$table->softDeletes()->nullable();
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
		Schema::drop('users');

	}

}
