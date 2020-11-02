<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Http\Requests\TurmaRequest;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = (new Turma())->newQuery();
        if (request()->get('nome')) {
            $turmas->where('nome', 'LIKE', '%' . request()->get('nome') . '%');
        }

        $turmas = $turmas->simplePaginate();

        return view('turma.index', compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TurmaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest $request)
    {
        $turma = new Turma();
        $turma->fill($request->all());

        if ($turma->save()) {
            return redirect()
                ->to(route('turmas.index'))
                ->with('success', __('Registro criado com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao criar registro!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        return redirect()
            ->to(route('alunos.edit', $turma->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {
        return view('turma.edit', compact('turma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TurmaRequest  $request
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(TurmaRequest $request, Turma $turma)
    {
        $turma->fill($request->all());
        if ($turma->save()) {
            return redirect()
                ->to(route('turmas.index'))
                ->with('success', __('Registro atualizado com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao atualizar registro!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        if ($turma->delete()) {
            return redirect()
                ->to(route('turmas.index'))
                ->with('success', __('Registro removido com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao remover registro!'));
    }
}
