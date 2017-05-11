<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the User database table seed.
     *
     * @return void
     */
    public function run()
    {
    	//create default admin user
        DB::table('users')->insert([
        	'department_id' => 1, 
            'role_id' => 3,
            'username' => 'ci_admin',
            'firstname' => 'Cytonn',
            'lastname' => 'Task Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('ahardtoguesspassword'),
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
    	//create a test user
        DB::table('users')->insert([
        	'department_id' => 1,
            'username' => 'test',
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('ahardtoguesspassword'),
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
    }
}
