<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use  Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($role1);
        $role2 = Role::create(['name' => 'user']);
        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'test2@example.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($role2);

    }
}
