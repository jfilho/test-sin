<form method="POST" action="{{ $url }}">
    @csrf
    @if(isset($aluno))
        @method('PUT')
    @endif

    <h5>{{__('Dados Pessoais')}}</h5>
    <hr/>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">{{ __('Nome') }}</label>
            <input id="nome" type="text" class="form-control" name="nome" value="{{ $aluno->nome ?? old('nome') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="data_nasc">{{ __('Data Nasc') }}</label>
            <input id="data_nasc" type="date" class="form-control" name="data_nasc" value="{{ isset($aluno) ? $aluno->data_nasc->format('Y-m-d') : old('data_nasc') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="sexo">{{ __('Sexo') }}</label>
            <select name="sexo" id="sexo" class="form-control">
                <option value="">{{ __('Selecione') }}</option>
                @php($current = $aluno->sexo ?? old('sexo'))
                @foreach(\App\Models\Aluno::SEXO_LIST as $value => $name)
                    <option value="{{ $value }}" {{ $current == $value ? 'selected' : ''}}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="cpf">{{ __('CPF') }}</label>
            <input id="cpf" type="text" v-mask="['###.###.###-##']" class="form-control" name="cpf" value="{{ $aluno->cpf ?? old('cpf') }}">
            <small>{{__('Somente números')}}</small>
        </div>
    </div>
    <h5>{{__('Endereço')}}</h5>
    <hr />
    <div class="form-row">
        <div class="form-group col-md-2" >
            <label for="cep">{{ __('CEP') }}</label>
            <input id="cep" @blur="getzipcode" type="text" v-mask="['#####-###']" class="form-control" name="cep" value="{{ isset($aluno) ? $aluno->endereco->cep : old('cep') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="logradouro">{{ __('Logradouro') }}</label>
            <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ isset($aluno) ? $aluno->endereco->logradouro : old('logradouro') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="numero">{{ __('Número') }}</label>
            <input id="numero" type="text" class="form-control" name="numero" value="{{ isset($aluno) ? $aluno->endereco->numero : old('numero') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="complemento">{{ __('Complemento') }}</label>
            <input id="complemento" type="text" class="form-control" name="complemento" value="{{ isset($aluno) ? $aluno->endereco->complemento : old('complemento') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="bairro">{{ __('Bairro') }}</label>
            <input id="bairro" type="text" class="form-control" name="bairro" value="{{ isset($aluno) ? $aluno->endereco->bairro : old('bairro') }}">
        </div>
        <div class="form-group col-md-5">
            <label for="cidade">{{ __('Cidade') }}</label>
            <input id="cidade" type="text" class="form-control" name="cidade" value="{{ isset($aluno) ? $aluno->endereco->cidade : old('cidade') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="uf">{{ __('Estado') }}</label>
            <select name="uf" id="uf" class="form-control">
                <option value="">{{ __('Selecione') }}</option>
                @php($current = isset($aluno) ? $aluno->endereco->uf : old('uf'))
                @foreach(\App\Models\Endereco::UF_LIST as $value => $name)
                    <option value="{{ $value }}" {{ $current == $value ? 'selected' : ''}}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-primary mr-1">
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">{{__('Voltar')}}</a>
        </div>
    </div>
</form>
@if(isset($aluno))
<div class="form-row">
    <div class="form-group col-md-12">
        <form method="POST" action="{{ route('alunos.destroy', $aluno->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Remover" class="btn btn-danger mr-1 float-right">
        </form>
    </div>
</div>
@endif
