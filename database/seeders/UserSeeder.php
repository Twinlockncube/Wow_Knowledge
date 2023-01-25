<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::factory()->create();
        $role2 = Role::factory()->create();
        User::factory(5)
                ->for($role1)
                ->create();
        User::factory(3)
                ->for($role2)
                ->create();
    }
}
