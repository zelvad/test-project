<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        # Create permission
        Permission::create(['name' => 'edit invoice']);
        Permission::create(['name' => 'delete invoice']);

        # Create roles
        $moderatorRole = Role::create(['name' => 'moderator']);
        $adminRole = Role::create(['name' => 'admin']);

        # Chaining permission
        $moderatorRole->givePermissionTo('edit invoice');
        $adminRole->givePermissionTo(Permission::all());

        # Create users
        $moderator = \App\Models\User::factory()->create([
            'name' => 'moderator',
            'email' => 'moder@admin.com',
            'password' => '12345678'
        ]);

        $admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '1234567'
        ]);

        # Assign roles
        $moderator->assignRole($moderatorRole);
        $admin->assignRole($adminRole);
    }
}
