<?php

namespace Database\Factories;

use App\Enums\Colors;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => ucwords($this->faker->words(3, true)),
            'price' => $this->faker->numberBetween(15, 150),
            'minutes' => $this->faker->numberBetween(15, 90),
            'color' => $this->faker->randomElement(Colors::cases())->value,
        ];
    }
}
