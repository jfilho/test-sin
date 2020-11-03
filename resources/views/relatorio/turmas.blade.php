@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mt-1 h4">{{ __('Relatório Turmas') }}</span>
                    </div>
                    <div class="container-fluid py-3">
                        <form method="GET" action="{{ route('relatorios.turmas') }}">
                            <div class="form-group align-self-end d-flex justify-content-end">
                                <button type="submit" name="export" value="1" class="btn btn-danger mr-1 float-right">
                                    {{__('Exportar PDF')}}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped table-sm small">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{__('Nome')}}</th>
                                            <th class="mobile-hide" scope="col">{{__('Total de alunos')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($values as $value)
                                            <tr>
                                                <td scope="col">{{ $value->nome }}</td>
                                                <td class="mobile-hide" scope="col">{{ $value->total }}</td>
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
        </div>
@endsection
