<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Mot de passe par défaut
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'job' => $this->faker->jobTitle(),
            'birth_day' => $this->faker->date('Y-m-d'),
            'degree' => $this->faker->randomElement(['Bac', 'Licence', 'Master', 'Doctorat']),
            'experience' => $this->faker->numberBetween(0, 10),
            'profile_pic' => $this->faker->imageUrl(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
