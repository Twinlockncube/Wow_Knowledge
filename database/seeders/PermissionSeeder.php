<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['delete','update','create','read'];
        foreach($permissions as $permission){
            Permission::factory()
                        ->create([
                'name' => $permission,
                'date' => fake()->dateTimeThisMonth()
            ]);
        }
    }
}
