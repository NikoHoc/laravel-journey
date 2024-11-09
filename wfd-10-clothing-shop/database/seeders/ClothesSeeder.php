<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $colors = ["Red", "Blue", "Green", "Yellow", "Black", "White"];
        $size = ["S", "M", "L", "XL"];
        for ($i = 0; $i < 10; $i++) {
            DB::table('clothes')->insert([
                'name' => fake()->firstName('male'),
                'color' => $colors[rand(0, sizeof($colors) - 1)],
                'size' => $size[rand(0, sizeof($size) - 1)],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        };
    }
}
