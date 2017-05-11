<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the Departments database table seed.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
        	'manager_id' => 1, //default user
            'name' => 'Default Department',
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
        DB::table('departments')->insert([
        	'manager_id' => 1, //default user
            'name' => 'ICT Department',
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
        DB::table('departments')->insert([
        	'manager_id' => 1, //default user
            'name' => 'Finance Department',
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
        DB::table('departments')->insert([
        	'manager_id' => 1, //default user
            'name' => 'Human Resources Department',
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
    }
}
