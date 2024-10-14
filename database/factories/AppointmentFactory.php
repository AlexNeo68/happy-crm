<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'customer_id' => null,
            'service_id' => null,
            'starts_at' => Carbon::createFromTimestamp(
                $this->faker->dateTimeBetween('-1 month', '+1 month')
                    ->getTimestamp()
            )->roundMinute(15),
            'is_confirmed' => $this->faker->boolean,
        ];
    }
}
