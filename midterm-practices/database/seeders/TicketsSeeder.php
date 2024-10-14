<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            ['movie_id' => '1', 'customer_name' => 'Joni', 'seat_number' => 'C14', 'is_checked_in' => true, 'check_in_time' => now()],
            ['movie_id' => '2', 'customer_name' => 'Anna', 'seat_number' => 'B12', 'is_checked_in' => true, 'check_in_time' => now()],
            ['movie_id' => '3', 'customer_name' => 'Mike', 'seat_number' => 'A8', 'is_checked_in' => true, 'check_in_time' => now()],
            ['movie_id' => '4', 'customer_name' => 'Sara', 'seat_number' => 'D10', 'is_checked_in' => true, 'check_in_time' => now()],
            ['movie_id' => '5', 'customer_name' => 'David', 'seat_number' => 'F5', 'is_checked_in' => true, 'check_in_time' => now()],
            ['movie_id' => '1', 'customer_name' => 'Emily', 'seat_number' => 'E3', 'is_checked_in' => false, 'check_in_time' => null],
            ['movie_id' => '2', 'customer_name' => 'Chris', 'seat_number' => 'C9', 'is_checked_in' => false, 'check_in_time' => null],
            ['movie_id' => '3', 'customer_name' => 'Olivia', 'seat_number' => 'B7', 'is_checked_in' => false, 'check_in_time' => null],
            ['movie_id' => '4', 'customer_name' => 'James', 'seat_number' => 'A2', 'is_checked_in' => false, 'check_in_time' => null],
            ['movie_id' => '5', 'customer_name' => 'Laura', 'seat_number' => 'D11', 'is_checked_in' => false, 'check_in_time' => null],
        ]);
    }
}
