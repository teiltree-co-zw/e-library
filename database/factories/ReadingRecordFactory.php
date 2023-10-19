<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadingRecord>
 */
class ReadingRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => '1',
            'student_id' => '1',
            'datetime' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'read_start' => $this->faker->dateTime(),
            'read_end' => dateTime()
        ];
    }
}
