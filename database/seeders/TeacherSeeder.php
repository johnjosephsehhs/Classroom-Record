<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
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
            'first_name' => 'Teacher',
            'middle_name' => 'T',
            'last_name' => 'Teacher',
            'role' => 2,
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher123'),  
        ]);
    }
}
