<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Call the AdminSeeder
        $this->call(AdminSeeder::class);

        //Call the TeachersSeeder
        $this->call(TeacherSeeder::class);

         //Call the StudentsSeeder
         $this->call(StudentSeeder::class);
    }
}
