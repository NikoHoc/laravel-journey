<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Walks>
 */
class WalksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dogOwnerId = $this->faker->randomElement([1, 2, 3, 4, 5]);

        return [
            'dog_owner_id' => $dogOwnerId,
            'started_at' => Carbon::now(), // Set the start time to now
            'finished_at' => $dogOwnerId % 2 !== 0 ? Carbon::now()->addHours(1) : null, // Generate finished_at only if dog_owner_id is odd
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
