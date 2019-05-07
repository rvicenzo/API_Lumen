<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

    public function up()
    {
        Schema::create('User', function(Blueprint $table) {
            $table->increments('id');
            // Schema declaration
            // Constraints declaration
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('User');
    }
}
