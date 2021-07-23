<?php

namespace Database\Factories;

use App\Models\Career;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'career_id' => rand(1, 5),
            'semester_id' => rand(8, 10),
            'identification' => $this->faker->numerify('##########'),
            'name' => $name,
            'slug' => str_replace(' ', '-', $name),
            'lastname' => $this->faker->lastName(),
            'mothers_lastname' => $this->faker->lastName()
        ];
    }
}
