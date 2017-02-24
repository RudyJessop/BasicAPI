<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $up){
            $up->increments('id');
            $up->string('email')->unique();
            $up->string('username')->unique();
            $up->string('password', 60);
            $up->rememberToken();
            $up->nullabletimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $up){

            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            Schema::drop('users');
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

        });
    }
}
