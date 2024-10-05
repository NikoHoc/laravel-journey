<?php

namespace Database\Factories;

use App\Models\Dogs;
use App\Models\Owners;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DogOwners>
 */
class DogOwnersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dog_id' => Dogs::factory(),
            'owner_id'=> Owners::factory(),
            'created_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')
        ];
    }
}
