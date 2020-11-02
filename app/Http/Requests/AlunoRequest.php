<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'      => 'required',
            'data_nasc' => 'required|date',
            'sexo'      => ['required', Rule::in(array_keys(\App\Models\Aluno::SEXO_LIST))],
            'cpf'       => 'required'
        ];
    }
}
