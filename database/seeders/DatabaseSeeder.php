<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Qualification;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Créer les catégories
        $categories = Category::factory()->count(10)->create();

        // Créer les qualifications
        Qualification::factory()->count(50)->create();

        // Créer les portfolios liés aux catégories
        $categories->each(function ($category) {
            $category->portfolios()->saveMany(Portfolio::factory()->count(3)->make());
        });

        // Créer les avis
        Review::factory()->count(20)->create();

        // Créer les services
        Service::factory()->count(15)->create();

        // Créer les paramètres
        Setting::factory()->count(5)->create();

        // Créer les compétences
        Skill::factory()->count(10)->create();

        User::factory()->count(1)->create();
    }
}
