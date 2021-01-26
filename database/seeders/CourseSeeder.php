<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course_code' => 'TEST0000',
            'name' => 'English Basic',
            'description' => 'English basic course for Everyone.',
            'category_id' => 1,
            'teacher_id' => 1,
            'duration' => 30,
            'fees' => 50000,
            'image' => 'default.png',
            'video' => 'default'
        ]);
    }
}
