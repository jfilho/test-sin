<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    const SEXO_MASC = 1;
    const SEXO_FEM = 2;
    const SEXO_IND = 3;

    const SEXO_LIST = [
        self::SEXO_MASC => 'Masculino',
        self::SEXO_FEM  => 'Feminino',
        self::SEXO_IND  => 'Indefinido',
    ];

    protected $dates = [
        'data_nasc'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'data_nasc',
        'sexo',
        'cpf',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id_aluno', 'id')->withDefault();
    }

    public function matricula()
    {
        return $this->hasOne(Matricula::class, 'id_aluno', 'id')->withDefault();
    }

    public function setCPFAttribute($cpf)
    {
        $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $cpf);
    }

    public function getSexoFormattedAttribute()
    {
        $sexo = self::SEXO_LIST[$this->sexo] ?? '';

        return $sexo;
    }
}
