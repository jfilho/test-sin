<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Support\Facades\Validator;
use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;
use App\Http\Requests\EnderecoRequest;
use App\Scopes\Aluno\FormSearchScope;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = (new Aluno())
            ->newQuery()
            ->withGlobalScope('AlunoSearch', FormSearchScope::class)
            ->simplePaginate();

        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AlunoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $aluno = new Aluno();
        $aluno->fill($request->all());

        $validator = Validator::make($request->all(), (new EnderecoRequest())->rules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $endereco = new Endereco();
        $endereco->fill($request->all());
        if ($aluno->save() && $aluno->endereco()->save($endereco)) {
            return redirect()
                ->to(route('alunos.index'))
                ->with('success', __('Registro criado com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao criar registro!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return redirect()
            ->to(route('alunos.edit', $aluno->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('aluno.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AlunoRequest  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $validator = Validator::make($request->all(), (new EnderecoRequest())->rules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $aluno->fill($request->all());
        $aluno->endereco->id_aluno = $aluno->id;
        $aluno->endereco->fill($request->all());
        if ($aluno->save() && $aluno->endereco->save()) {
            return redirect()
                ->to(route('alunos.index'))
                ->with('success', __('Registro atualizado com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao atualizar registro!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        if ($aluno->delete()) {
            return redirect()
                ->to(route('alunos.index'))
                ->with('success', __('Registro removido com sucesso!'));
        }

        return redirect()
            ->back()->withInput()
            ->withErrors(__('Error ao remover registro!'));
    }
}
