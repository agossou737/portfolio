<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $icons = [
            'fa fa-code',
            'fa fa-desktop',
            'fa fa-mobile-alt',
            'fa fa-pencil-ruler',
            'fa fa-chart-line',
            'fa fa-server',
            'fa fa-database',
            'fa fa-cloud',
            'fa fa-lock',
            'fa fa-cogs',
        ];

        return [
            'name' => $this->faker->unique()->sentence(3),
            'icon' => $this->faker->randomElement($icons),
            'description' => $this->faker->paragraph,
        ];
    }
}
