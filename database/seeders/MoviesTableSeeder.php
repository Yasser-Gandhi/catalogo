<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'synopsis'=> 'Lrem ipsum',
                'year' => '1994',
                'cover'=>  'Empty',
            ],
            [
                'title' => 'Titanic',
                'synopsis'=> 'Lorem ipsum',
                'year' => '1994',
                'cover'=>  'Empty',
            ]
        ];

        foreach($movies as $key => $value){
            Movie::create($value);
        }
}
