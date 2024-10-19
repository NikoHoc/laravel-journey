<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DogOwners;
use App\Models\Dogs;
use App\Models\Owners;
use App\Models\Walks;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(DogsSeeder::class)
        //$this->call(OwnersSeeder::class)

        // Dogs::factory(5)->create();
        // Owners::factory(3)->create();
        // DogOwners::factory(5)->create();
        // Walks::factory()->count(10)->create();

        $this->call(DogsSeeder::class);
        $this->call(OwnersSeeder::class);
        $this->call(DogOwnersSeeder::class);
        $this->call(WalksSeeder::class);
    }
}
