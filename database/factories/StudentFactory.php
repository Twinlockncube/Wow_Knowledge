<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {//Student[id,name,idnumber,date,user_id(foreign)]
        return [
            'name' => fake()->firstName()." ".fake()->lastName(),
            'idnumber' => "SD".fake()->numberBetween(1000,9900),
            'date' => fake()->dateTimeThisMonth(),
            'user_id' => User::factory()->create()->id
        ];
    }
}
