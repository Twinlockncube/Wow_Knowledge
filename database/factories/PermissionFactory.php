<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $permissions = ['delete','update','create','read'];
        return [
            'name' => $permissions[rand(0,count($permissions)-1)],
            'date' => fake()->dateTimeThisMonth()
        ];
    }
}
