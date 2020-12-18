<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
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
        Teacher::create([
            'name' => 'Teacher 1',
            'email' => 'teacher1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        Teacher::create([
            'name' => 'Teacher 2',
            'email' => 'teacher2@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        Teacher::create([
            'name' => 'Teacher 3',
            'email' => 'teacher3@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
