<form method="POST" action="{{ $url }}">
    @csrf
    @if(isset($turma))
        @method('PUT')
    @endif

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">{{ __('Nome') }}</label>
            <input id="nome" type="text" class="form-control" name="nome" value="{{ $turma->nome ?? old('nome') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-primary mr-1">
            <a href="{{ route('turmas.index') }}" class="btn btn-secondary">{{__('Voltar')}}</a>
        </div>
    </div>
</form>
@if(isset($turma))
<div class="form-row">
    <div class="form-group col-md-12">
        <form method="POST" action="{{ route('turmas.destroy', $turma->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Remover" class="btn btn-danger mr-1 float-right">
        </form>
    </div>
</div>
@endif
