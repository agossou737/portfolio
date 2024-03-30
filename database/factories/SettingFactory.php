<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'about_title' => $this->faker->sentence(3),
            'about_description' => $this->faker->paragraph,
            'fb_url' => $this->faker->url,
            'github_url' => $this->faker->url,
            'linkedin_url' => $this->faker->url,
            'freelance_url' => $this->faker->url,
            'cv_url' => $this->faker->url,
            'video_url' => $this->faker->url,
            'about_photo' => $this->faker->imageUrl(),
            'contact_mail' => $this->faker->email,
        ];
    }
}
