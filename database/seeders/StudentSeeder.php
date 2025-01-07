<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $adminRole = DB::table('roles')->where('name', 'admin')->first();

        
        DB::table('users')->insert([
            'first_name' => 'Student',
            'middle_name' => 'S',
            'last_name' => 'Student',
            'role' => 3,
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),  
        ]);
    }
}
