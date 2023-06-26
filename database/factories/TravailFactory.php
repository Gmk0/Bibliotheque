<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Domaine;
use App\Models\Travail;

class TravailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Travail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'matricule' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'titre' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'categorie' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'annee_academique' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'code_classification' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nbre_pages' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'viewCount' => $this->faker->randomFloat(2, 0, 999999.99),
            'path' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'domaine_id' => Domaine::factory(),
        ];
    }
}
