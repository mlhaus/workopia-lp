<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        Permission::create(['name' => 'view-all-users']);
        Permission::create(['name' => 'delete-users']);
        $adminRole->givePermissionTo([
            'view-all-users',
            'delete-users',
        ]);
        $editorRole->givePermissionTo([
            'view-all-users',
        ]);
    }
}
