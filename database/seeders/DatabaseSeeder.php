<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'abdo',
            'email' => 'abdo@gmail.com',
            'password' => hash::make('123'),
            'role_id' => 1
            
        ]);
        Product::factory()->create([
            'name' => 'abdo',
            'description' => 'abdo@gmail.com',
            'price' => hash::make('123'),
            'image_path' => hash::make('123'),
            
        ]);
    }
}
