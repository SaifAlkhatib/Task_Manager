<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
            'user_id'=> User::inRandomOrder()->value('id') ?? User::factory(),
            'title'=>fake()->sentence,
            'description'=>fake()->text(200),
            'priority'=>fake()->randomElement(['high', 'medium','low'])
        ];
    }
}
