@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mt-1 h4">{{ __('Editar Turma') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            @include('turma.partials.form', ['url' => route('turmas.update', $turma->id)])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
