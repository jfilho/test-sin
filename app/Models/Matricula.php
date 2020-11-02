<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_aluno',
        'id_turma',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class,'id_aluno', 'id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'id_turma', 'id');
    }
}
