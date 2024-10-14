<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'id' => 1,
                'movie_title' => 'Kuasa Gelap',
                'duration' => 120,
                'release_date' => '2024-10-15'
            ],
            [
                'id' => 2,
                'movie_title' => 'Grand Turismo',
                'duration' => 160,
                'release_date' => '2024-09-21'
            ],
            [
                'id' => 3,
                'movie_title' => 'Avengers: End Game',
                'duration' => 150,
                'release_date' => '2024-12-24'
            ],
            [
                'id' => 4,
                'movie_title' => 'Black Panther',
                'duration' => 150,
                'release_date' => '2024-11-09'
            ],
            [
                'id' => 5,
                'movie_title' => 'Spiderman',
                'duration' => 120,
                'release_date' => '2024-01-01'
            ],
        ]);
    }
}
