<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksTest extends TestCase
{
    /**
     * Test if a user can view their tasks
     *
     * @return void
     */
    public function testUserCanViewTheirTasks()
    {
        $task = factory('App\Task')->create();
        $response = $this->get('/tasks');
        $response->assertSee($task->title);    
    }

    public function testUserCanViewSingleTask(){
    	$task = factory('App\Task')->create();
        $response = $this->get('/tasks/' . $task->id);
        $response->assertSee($task->title);
    }

    /**
     * Test Tasks API
     *
     * @return void
     */
    public function testTasksAPIGet()
    {
    	$task = factory('App\Task')->create(['title'=>'A test title']);
        $response = $this->json('GET', 'api/tasks');
        $response->assertStatus(200);
    }
}
