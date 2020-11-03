@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="mt-1 h4">{{ __('Relatório Alunos') }}</span>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form method="GET" action="{{ route('relatorios.alunos') }}">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id_aluno">{{ __('Código Aluno') }}</label>
                                    <input id="id_aluno" type="text" class="form-control" name="id_aluno" value="{{ request()->get('id_aluno') }}">
                                </div>
                                <div class="form-group align-self-end d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-1">{{__('Buscar')}}</button>
                                </div>
                            </div>
                            <div class="form-group align-self-end d-flex justify-content-end">
                                <button type="submit" name="export" value="1" class="btn btn-danger mr-1 float-right">{{__('Exportar PDF')}}</button>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                @if($aluno)

                                    <h5>{{__('Dados Pessoais')}}</h5>
                                    <hr/>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="nome">{{ __('Nome') }}:</label>
                                            <span class="mt-2">{{ $aluno->nome }}</span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="data_nasc">{{ __('Data Nasc') }}:</label>
                                            <span class="mt-2">{{ $aluno->data_nasc->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="sexo">{{ __('Sexo') }}:</label>
                                            <span class="mt-2">{{ $aluno->sexo_formatted }}</span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cpf">{{ __('CPF') }}:</label>
                                            <span class="mt-2">{{ $aluno->cpf }}</span>
                                        </div>
                                    </div>
                                    <h5>{{__('Endereço')}}</h5>
                                    <hr />
                                    <div class="form-row">
                                        <div class="form-group col-md-2" >
                                            <label for="cep">{{ __('CEP') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->cep }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="logradouro">{{ __('Logradouro') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->logradouro }}</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="numero">{{ __('Número') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->numero }}</span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="complemento">{{ __('Complemento') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->complemento }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="bairro">{{ __('Bairro') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->bairro }}</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cidade">{{ __('Cidade') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->cidade }}</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="uf">{{ __('Estado') }}:</label>
                                            <span class="mt-2">{{ $aluno->endereco->uf }}</span>
                                        </div>
                                    </div>
                                    <h5>{{__('Matrícula')}}</h5>
                                    <hr />
                                    @if($aluno->matricula)
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="turma">{{ __('Turma') }}:</label>
                                                <span class="mt-2">{{ $aluno->matricula->turma->nome }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <p>{{__('Aluno não matriculado.')}}</p>
                                    @endif
                                @else
                                    <p>{{__('Nenhum registro encontrado.')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection







