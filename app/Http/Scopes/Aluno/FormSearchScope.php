<?php

namespace App\Scopes\Aluno;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FormSearchScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (request()->get('nome')) {
            $builder->where('nome', request()->get('nome'));
        }
    }
}
