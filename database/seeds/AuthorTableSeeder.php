<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Akyi Taw'
        ]);
        DB::table('authors')->insert([
            'name' => 'Min Lu'
        ]);
    }
}
