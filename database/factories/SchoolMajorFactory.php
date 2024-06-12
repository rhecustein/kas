<?php

namespace Database\Factories;

use App\Models\SchoolMajor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolMajor>
 */
class SchoolMajorFactory extends Factory
{
    protected $model = SchoolMajor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'abbreviation' => $this->faker->unique()->word(),
        ];
    }
}
