<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'world war',
            'description' => 'about war',
            'author_id' => '2',
            'genre_id' => '3',
            'publish_date'  => '23/12/2013'
        ]);
    }
}
