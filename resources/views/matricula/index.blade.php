@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mt-1 h4">{{ __('Matrícula') }}</span>
                        <a href="{{ route('matriculas.create') }}" class="btn btn-success btn-sm mr-1 float-right">Cadastrar</a>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form method="GET" action="{{ route('matriculas.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nome">{{ __('Turma') }}</label>
                                        <select name="id_turma" class="custom-select" id="id_turma">
                                            <option value=""></option>
                                            @foreach($turmas as $turma)
                                            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group align-self-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1">Buscar</button>
                                        <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">Limpar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped table-sm small">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Aluno</th>
                                                <th scope="col">Turma</th>
                                                <th class="mobile-hide" scope="col">Data Criação</th>
                                                <th class="mobile-hide" scope="col">Data Atualização</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($matriculas as $matricula)
                                            <tr>
                                                <td scope="col"><a href="{{ route('matriculas.edit', $matricula->id) }}">{{ $matricula->id }}</a></td>
                                                <td scope="col">{{ $matricula->aluno->nome }}</td>
                                                <td scope="col">{{ $matricula->turma->nome }}</td>
                                                <td class="mobile-hide" scope="col">{{ $matricula->created_at->format('d/m/Y h:i:s') }}</td>
                                                <td class="mobile-hide" scope="col">{{ $matricula->updated_at->format('d/m/Y h:i:s') }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Nenhum registro encontrado.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="row justify-content-center pb-0">
                {{ $matriculas->links() }}
            </div>
        </div>
    </div>

@endsection
