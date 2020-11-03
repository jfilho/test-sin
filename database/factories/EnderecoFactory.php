<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cep'           => preg_replace('/[^0-9]/', '', $this->faker->postcode),
            'logradouro'    => $this->faker->streetName,
            'complemento'   => $this->faker->secondaryAddress,
            'numero'        => $this->faker->buildingNumber,
            'bairro'        => '-',
            'cidade'        => $this->faker->city,
            'uf'            => $this->faker->stateAbbr,
        ];
    }
}
