<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(\App\Enums\TaskStatusEnum::cases()),
            'deadline' => $this->faker->dateTime,
            'estimated_hours' => $this->faker->randomFloat(2, 0, 100),
            'project_id' => \App\Models\Project::query()->inRandomOrder()->first()?->id ?? \App\Models\Project::factory(),
            'created_user_id' => \App\Models\User::query()->inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'assigned_user_id' => \App\Models\User::query()->inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
        ];
    }
}
