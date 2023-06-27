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
            'matricule' => $this->getMatricule(),
            'nom' => $this->faker->name(),
            'postnom' =>
            $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            "faculte" => $this->faker->randomElement(array('SCIENCES INFORMATIQUE', 'ECONOMIE & DEVELOPEMMENT', 'MEDECIN', 'PHILOSOPHIQUE', 'DROIT', 'DROIT CANONIQUE', "COMMUNICATION SOCIAL")),
            'user_id' =>
            $this->getIdUser(),
        ];
    }

    public function getMatricule()
    {

        $anneeD = 18;
        $anneF = 19;
        $ucc = 'ucc'; // Remplacez cela par la valeur souhaitée
        $format = '0000'; // Format du nombre incrémenté

        $nombreEtudiants = etudiant::count(); // Compte le nombre d'étudiants dans la table User

        $numero = str_pad($nombreEtudiants + 1, strlen($format), '0', STR_PAD_LEFT); // Incrémente et formate le numéro

        return "{$anneeD}/{$ucc}/{$numero}/{$anneF}";
    }

    public function getIdUser()
    {
        $nombreEtudiants = etudiant::count();
        return $nombreEtudiants + 1;
    }
}