<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    const UF_LIST = [
        'AC' => 'AC',
        'AL' => 'AL',
        'AP' => 'AP',
        'AM' => 'AM',
        'BA' => 'BA',
        'CE' => 'CE',
        'DF' => 'DF',
        'ES' => 'ES',
        'GO' => 'GO',
        'MA' => 'MA',
        'MT' => 'MT',
        'MS' => 'MS',
        'MG' => 'MG',
        'PA' => 'PA',
        'PB' => 'PB',
        'PR' => 'PR',
        'PE' => 'PE',
        'PI' => 'PI',
        'RJ' => 'RJ',
        'RN' => 'RN',
        'RS' => 'RS',
        'RO' => 'RO',
        'RR' => 'RR',
        'SC' => 'SC',
        'SP' => 'SP',
        'SE' => 'SE',
        'TO' => 'TO',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_aluno',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno', 'id');
    }

    public function setCepAttribute($cep)
    {
        $this->attributes['cep'] = preg_replace('/[^0-9]/', '', $cep);
    }
}
