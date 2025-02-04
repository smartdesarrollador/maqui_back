<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "admin",
            'email' => "admin@maquimotora.com",
            'email_verified_at' => null,
            'password' => Hash::make('admin2025'),
            'rol' => 'administrador',
            'remember_token' => null,
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => "Jacky",
            'email' => "jacky@testcorreo.com",
            'email_verified_at' => null,
            'password' => Hash::make('1234567'),
            'rol' => 'autor',
            'remember_token' => null,
        ]);
    
    DB::table('users')->insert([
            'id' => 3,
            'name' => "Tomas",
            'email' => "tomas@testcorreo.com",
            'email_verified_at' => null,
            'password' => Hash::make('peru123'),
            'rol' => 'autor',
            'remember_token' => null,
        ]);

        
    }
}
