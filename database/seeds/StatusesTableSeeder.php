<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the statuses database table seed.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
        	'id' => 1,
            'name' => 'New',
            'state' => 'new',
            'desc' => 'A new Task',
            'sort' => 1,
            'allow_reopen' => 0,
        ]);
        DB::table('statuses')->insert([
        	'id' => 2,
            'name' => 'Ongoing',
            'state' => 'pending',
            'desc' => 'An ongoing Task',
            'sort' => 2,
            'allow_reopen' => 0,
        ]);
        DB::table('statuses')->insert([
        	'id' => 3,
            'name' => 'Complete',
            'state' => 'closed',
            'desc' => 'A completed task',
            'sort' => 3,
            'allow_reopen' => 1,
        ]);
        DB::table('statuses')->insert([
        	'id' => 4,
            'name' => 'Closed',
            'state' => 'closed',
            'desc' => 'A closed Task. Task will still be accessible',
            'sort' => 4,
            'allow_reopen' => 1,
        ]);
        DB::table('statuses')->insert([
        	'id' => 5,
            'name' => 'Archived',
            'state' => 'archived',
            'desc' => 'An archived Task. Task only adminstratively available but no longer accessible',
            'sort' => 5,
            'allow_reopen' => 0,
        ]);
        DB::table('statuses')->insert([
        	'id' => 6,
            'name' => 'Deleted',
            'state' => 'deleted',
            'desc' => 'Tasks queued for deletion. Not accessible on task queue',
            'sort' => 6,
            'allow_reopen' => 0,
        ]);
    }
}
