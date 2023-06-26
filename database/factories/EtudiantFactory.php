<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\etudiant;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'matricule' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'nom' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'postnom' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'prenom' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'faculte' => $this->faker->regexify('[A-Za-z0-9]{250}'),
        ];
    }
}
