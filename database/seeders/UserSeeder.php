<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'Master',
            'role_id' => 1,
            'email' => 'admin@exmaple.com',
            'password' => Hash::make('1'),
        ]);
        
        User::create([
            'name' => 'Master2',
            'role_id' => 2,
            'email' => 'admin2@exmaple.com',
            'password' => Hash::make('1'),
        ]);  
    }
}
