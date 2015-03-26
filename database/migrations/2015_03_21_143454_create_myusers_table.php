<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyusersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('myusers', function(Blueprint $table)
    {
      $table->increments('id');
      $table->string('nick', 100);
      $table->string('login', 100);
      $table->string('email', 100);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('myusers');
  }

}