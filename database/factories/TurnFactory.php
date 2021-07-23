<?php

namespace Database\Factories;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dayOfMonth = ['lunes','martes','miércoles','jueves','viernes'];

        return [
            'status' => 1,
            'days' => $dayOfMonth[rand(0,4)],
            'hour' => $this->faker->time('H:i:s', now()),
        ];
    }
}
