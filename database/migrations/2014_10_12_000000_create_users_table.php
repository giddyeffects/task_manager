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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 50)->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('active')->default(false);  //is user active or not. Default is inactive
            $table->unsignedInteger('dept_id');         //department id
            $table->unsignedInteger('role_id');         //role id
            $table->boolean('vacation')->default(false);//is user on leave or not. Default is not
            $table->string('phone', 15)->nullable();        //user's phone number
            $table->string('phone_ext', 4)->nullable();    //user's extension
            $table->string('signature', 255)->nullable();    //user's signature
            //foreign keys
            $table->foreign('dept_id')->references('id')->on('department');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
