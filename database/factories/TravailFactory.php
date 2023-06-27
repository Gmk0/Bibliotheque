<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Domaine;
use App\Models\Etudiant;
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
            'matricule' => $this->faker->bothify('??#?##?###'),
            'titre'
            => $this->faker->sentence(),
            'image' => "/images/default.png",
            'categorie'
            => $this->faker->randomElement(array('TFC', 'MEMOIRE')),
            'annee_academique' =>
            $this->faker->numberBetween(2022, 2024),
            'code_classification' =>
            $this->faker->bothify('?#?#?###'),
            'nbre_pages' => $this->faker->numberBetween(50, 90),
            'viewCount' => $this->faker->randomFloat(2, 0, 999999.99),
            'path' => "/travail/tfc/travail.pdf",
            'domaine_id' => $this->faker->numberBetween(1, 41),
            'etudiant_id' => $this->faker->numberBetween(500, 800),
        ];
    }

    public function getIdUser()
    {
        $nombreEtudiants = Etudiant::count();
        return $nombreEtudiants + 1;
    }
}