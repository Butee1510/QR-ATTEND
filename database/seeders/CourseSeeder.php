<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('courses')->insert([
            ['name' => 'Introduction to Computer Science', 'code' => 'COSC101', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Structures and Algorithms', 'code' => 'COSC201', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Systems', 'code' => 'COSC301', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web Development', 'code' => 'C0SC401', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }


}
