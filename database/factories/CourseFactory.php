<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_name' => 'Course Name',
            'course_desc' => 'This is a course!',
            'course_topic' => '',
            'course_slot' => 1,
            'course_author' => 1,
            'course_time' => time() + 86400
        ];
    }
}
