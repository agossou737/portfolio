<?php

namespace Database\Factories;

use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fromYear = $this->faker->year();
        $toYear = $fromYear + $this->faker->numberBetween(1, 5);

        return [
            'title' => $this->faker->sentence(3),
            'association' => $this->faker->company,
            'description' => $this->faker->sentence(4),
            'from' => $fromYear . '-' . $this->faker->month() . '-' . $this->faker->dayOfMonth(),
            'to' => $toYear . '-' . $this->faker->month() . '-' . $this->faker->dayOfMonth(),
            'type' => $this->faker->randomElement(['Education','Work']),
        ];
    }
}
