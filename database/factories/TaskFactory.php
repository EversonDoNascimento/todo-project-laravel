<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition()
    {
        $user = User::all()->random();
        while(count($user->categories) == 0){
            $user = User::all()->random();

        }
        return [
            "title" => $this->faker->text(20),
            "description" => $this->faker->text(50),
            "is_done" => $this->faker->boolean(),
            "duo_date" => $this->faker->dateTime(),
            "user_id" => $user,
            "category_id" => $user->categories->random(),

        ];
    }
}
