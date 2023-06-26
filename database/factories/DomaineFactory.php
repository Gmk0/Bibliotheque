<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Domaine;

class DomaineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Domaine::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'intitule' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'image' => $this->faker->regexify('[A-Za-z0-9]{250}'),
            'description' => $this->faker->text,
            'is_published' => $this->faker->boolean,
        ];
    }
}
