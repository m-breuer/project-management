<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salutation' => $this->faker->randomElement(\App\Enums\CustomerSalutationEnum::cases()),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'company_name' => $this->faker->company(),
            'tax_number' => $this->faker->randomNumber(8),
            'street' => $this->faker->streetName(),
            'location' => $this->faker->city(),
            'country' => $this->faker->country(),
            'mobile_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
