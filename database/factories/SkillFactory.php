<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colors = [
            '#ff5e57',
            '#ffa857',
            '#ffee57',
            '#8fdf63',
            '#5ad2ff',
            '#5d7dff',
            '#ac5dff',
            '#ff5d9e',
        ];

        return [
            'name' => $this->faker->unique()->word,
            'percent' => $this->faker->numberBetween(50, 100),
            'color' => $this->faker->randomElement($colors),
        ];
    }
}
