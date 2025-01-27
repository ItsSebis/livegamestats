<?php

namespace Database\Factories;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlayersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gameId' => 1,
            'teamId' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name(),
            'number' => $this->faker->numberBetween(1, 99),
            'goalkeeper' => $this->faker->boolean(),
        ];
    }
}
