@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mt-1 h4">{{ __('Turma') }}</span>
                        <a href="{{ route('turmas.create') }}" class="btn btn-success btn-sm mr-1 float-right">{{__('Cadastrar')}}</a>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form method="GET" action="{{ route('turmas.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="nome">{{ __('Nome') }}</label>
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ request()->get('nome') }}">
                                    </div>
                                    <div class="form-group align-self-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1">{{__('Buscar')}}</button>
                                        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">{{__('Limpar')}}</a>
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
                                                <th scope="col">{{__('Nome')}}</th>
                                                <th class="mobile-hide" scope="col">{{__('Data Criação')}}</th>
                                                <th class="mobile-hide" scope="col">{{__('Data Atualização')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($turmas as $turma)
                                            <tr>
                                                <td scope="col"><a href="{{ route('turmas.edit', $turma->id) }}">{{ $turma->id }}</a></td>
                                                <td scope="col">{{ $turma->nome }}</td>
                                                <td class="mobile-hide" scope="col">{{ $turma->created_at->format('d/m/Y h:i:s') }}</td>
                                                <td class="mobile-hide" scope="col">{{ $turma->updated_at->format('d/m/Y h:i:s') }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">{{__('Nenhum registro encontrado.')}}</td>
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
                {{ $turmas->links() }}
            </div>
        </div>
    </div>

@endsection
