<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('creator_id');              //user id of the one who created the task
            $table->unsignedInteger('assigned_id');             //user id of the staff assigned
            $table->unsignedInteger('category_id');             //category id of the task
            $table->unsignedInteger('user_group_id');           //user group id of the task if task is NOT public
            $table->unsignedInteger('status_id')->default(1);   //current status of the task. Default is New
            $table->bigInteger('number')->unique();             //a unique reference number for easier reference to staff
            $table->string('title');                            //Title of the task
            $table->text('description');                        //a description of the task.
            $table->enum('priority', ['low', 'normal','high','emergency'])->default('normal');
            $table->boolean('hasresponse')->default(false);     //task has at least one response from assignee
            $table->boolean('isprivate')->default(false);       //is task private or not
            $table->boolean('isoverdue')->default(false);       //is task overdue or not
            $table->dateTime('due_date')->nullable();
            $table->dateTime('closed_date')->nullable();
            $table->dateTime('reopened_date')->nullable();
            $table->dateTime('last_update')->nullable();
            $table->timestamps();
            //foreign keys
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade'); //if a task creator gets deleted then their tasks get deleted too
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
