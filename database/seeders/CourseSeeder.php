<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'DevOps с нуля',
                'description' => 'Docker, CI/CD, VPS, Linux',
                'is_paid' => false,
            ],
            [
                'title' => 'Laravel Backend Pro',
                'description' => 'Laravel 12, API, очереди, production',
                'is_paid' => true,
                'price' => 30000,
            ],
            [
                'title' => 'Go + PostgreSQL',
                'description' => 'Gin, pgx, REST API',
                'is_paid' => true,
                'price' => 25000,
            ],
        ];

        foreach ($courses as $c) {
            Course::firstOrCreate(
                ['slug' => Str::slug($c['title'])],
                $c
            );
        }
    }
}
