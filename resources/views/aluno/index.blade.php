@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mt-1 h4">{{ __('Aluno') }}</span>
                        <a href="{{ route('alunos.create') }}" class="btn btn-success btn-sm mr-1 float-right">Cadastrar</a>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form method="GET" action="{{ route('alunos.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="nome">{{ __('Nome') }}</label>
                                        <input id="name" type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                                    </div>
                                    <div class="form-group align-self-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1">Buscar</button>
                                        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Limpar</a>
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
                                                <th scope="col">Nome</th>
                                                <th scope="col">Data Nasc</th>
                                                <th scope="col">CPF</th>
                                                <th class="mobile-hide" scope="col">Data Criação</th>
                                                <th class="mobile-hide" scope="col">Data Atualização</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($alunos as $aluno)
                                            <tr>
                                                <td scope="col"><a href="{{ route('alunos.edit', $aluno->id) }}">{{ $aluno->id }}</a></td>
                                                <td scope="col">{{ $aluno->nome }}</td>
                                                <td scope="col">{{ $aluno->data_nasc->format('d/m/Y') }}</td>
                                                <td scope="col">{{ $aluno->cpf }}</td>
                                                <td class="mobile-hide" scope="col">{{ $aluno->created_at->format('d/m/Y h:i:s') }}</td>
                                                <td class="mobile-hide" scope="col">{{ $aluno->updated_at->format('d/m/Y h:i:s') }}</td>
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
                {{ $alunos->links() }}
            </div>
        </div>
    </div>

@endsection
