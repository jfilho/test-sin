<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = rand(1, 3);
        return [
            'nome'      => $this->faker->name($gender == 1 ? 'male' : 'female'),
            'data_nasc' => $this->faker->dateTimeBetween('-10 years')->format('Y-m-d'),
            'sexo'      => $gender,
            'cpf'       => $this->faker->cpf()
        ];
    }
}
