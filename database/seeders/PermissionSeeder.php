<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        $permissions=[

            'show settings', 'show blogs', 'edit blogs', 'add blogs'
            

        ];
         foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        $rootRole = Role::firstOrCreate(['name' => 'root']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $permissions = Permission::pluck('name')->toArray();
        $rootRole->syncPermissions($permissions);
        $adminRole->syncPermissions($permissions);
        
    }
}
