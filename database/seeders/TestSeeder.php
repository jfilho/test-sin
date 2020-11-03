<?php

namespace Database\Seeders;

use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando as turmas
        foreach(range(1, 4) as $serie) {
            $turma = new Turma();
            $turma->nome = sprintf('%u - Série', $serie);
            $turma->save();
        }

        \App\Models\Aluno::factory(20)->create()->each(function($aluno) {
            // Adiciona o endereço ao aluno
            $aluno->endereco()->saveMany(\App\Models\Endereco::factory(1)->make());
            // Matricula o aluno aleatóriamente
            $matricula = new Matricula();
            $matricula->id_aluno = $aluno->id;
            $matricula->id_turma = rand(1, 4);
            $matricula->save();
        });
    }
}
