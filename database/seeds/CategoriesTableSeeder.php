<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the Categories database table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'dept_id' => 1, //default department
            'name' => 'Default Category',
            'created_at' => date ("Y-m-d H:i:s", time()),
        ]);
    }
}
