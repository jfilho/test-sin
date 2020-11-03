<form method="POST" action="{{ $url }}">
    @csrf
    @if(isset($matricula))
        @method('PUT')
    @endif

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_turma">{{ __('Turma') }}</label>
            <select name="id_turma" class="custom-select" id="id_turma">
                <option value=""></option>
                @php($current = $matricula->id_turma ?? old('id_turma'))
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ $current == $turma->id ? 'selected' : ''}}>{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="id_aluno">{{ __('Aluno') }}</label>
            <select name="id_aluno" class="custom-select" id="id_aluno">
                <option value=""></option>
                @php($current = $matricula->id_aluno ?? old('id_aluno'))
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $current == $aluno->id ? 'selected' : ''}}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-primary mr-1">
            <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">{{__('Voltar')}}</a>
        </div>
    </div>
</form>
@if(isset($matricula))
<div class="form-row">
    <div class="form-group col-md-12">
        <form method="POST" action="{{ route('matriculas.destroy', $matricula->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Remover" class="btn btn-danger mr-1 float-right">
        </form>
    </div>
</div>
@endif
