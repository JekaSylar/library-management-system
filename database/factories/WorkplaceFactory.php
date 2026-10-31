<?php

namespace Database\Factories;

use App\Models\Workplace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Workplace>
 */
class WorkplaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->buildingNumber(),
            'housing' => $this->faker->optional(0.65)->buildingNumber(),
            'apartment' => $this->faker->optional(0.6)->buildingNumber(),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
