<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the Roles database table seed.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Normal User',
            'permissions' => '{"task.create":1,"task.assign":1,"task.reassign":1,"task.reply":1}'
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager',
            'permissions' => '{"task.create":1,"task.edit":1,"task.assign":1,"task.reassign":1,"task.reply":1,"task.close":1,"task.archive":1,"task.view.dept":1,"task.view.private":1,"reports.view":1,"reports.create":1}'
        ]);
        DB::table('roles')->insert([
            'name' => 'Super User',
            'permissions' => '{"task.create":1,"task.edit":1,"task.assign":1,"task.reassign":1,"task.reply":1,"task.close":1,"task.archive":1,"task.delete":1,"task.view.dept":1,"task.view.private":1,"thread.edit":1,"reports.view":1,"reports.create":1}'
        ]);
    }
}
