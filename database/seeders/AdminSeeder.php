<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = DB::table('roles')->where('name', 'admin')->first();

        
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'middle_name' => 'A',
            'last_name' => 'Administrator',
            'role' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),  
        ]);
    }
}
