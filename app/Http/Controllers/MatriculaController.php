<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\Turma;
use App\Http\Requests\MatriculaRequest;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = (new Matricula())->newQuery();
        if (request()->get('id_turma')) {
            $matriculas->where('id_turma', '=', request()->get('id_turma'));
        }

        $matriculas = $matriculas->simplePaginate();
        $turmas = Turma::all(['id', 'nome']);

        return view('matricula.index', compact('matriculas', 'turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all(['id', 'nome']);
        $turmas = Turma::all(['id', 'nome']);

        return view('matricula.create', compact('alunos', 'turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaRequest $request)
    {
        $matricula = new Matricula();
        $matricula->fill($request->all());

        if ($matricula->save()) {
            return redirect()
                ->to(route('matriculas.index'))
                ->with('success', __('Registro criado com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao criar registro!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        return redirect()
            ->to(route('matriculas.edit', $matricula->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $alunos = Aluno::all(['id', 'nome']);
        $turmas = Turma::all(['id', 'nome']);

        return view('matricula.edit', compact( 'matricula', 'alunos', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\MatriculaRequest  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaRequest $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
