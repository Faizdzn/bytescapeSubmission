<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseEntry;
use App\Models\Kelas;
use App\Models\KelasEntry;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test User1',
        ]);
        
        // Course::factory()->create([
        //     'course_name' => 'Course1',
        //     'course_desc' => 'this is a test course'
        // ]);
    }
}
