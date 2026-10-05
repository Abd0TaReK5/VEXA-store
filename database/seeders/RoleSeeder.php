<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Roles=['admin','user'];
        foreach ($Roles as $Role) {
            Role::firstOrCreate(['name' => $Role], ['guard_name' => 'web']);
        
        }
        
        DB::table(table: 'Roles')->insert($Roles);
        }
}
