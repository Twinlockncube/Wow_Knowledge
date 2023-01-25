<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Minister','MEC','HeadBoy','Prefect'];
        foreach($roles as $role){
            return Role::factory()
                   ->hasAttached(Permission::factory())
                   ->create(
                ['name' => $role,
                'date' => fake()->dateTimeThisMonth()
            ]);
        }
    }
}
