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
        $user = factory('App\User')->create();
        $task = factory('App\Task')->create(['creator_id'=>$user->id]);
        $response = $this->actingAs($user)->get('/tasks');
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

    /**
     * Test GET Users API
     *
     * @return void
     */
    public function testUsersAPIGet()
    {
        $response = $this->json('GET', 'api/gettheusers');
        $response->assertStatus(200);
    }

    /**
     * Test Categories API
     *
     * @return void
     */
    public function testCategoriesAPIGet()
    {
        $response = $this->json('GET', 'api/categories');
        $response->assertStatus(200)->assertJson([['name'=>'Default Category']]); //there must be a default category
    }
}
