<html>
<title>{{ config('app.name') }} - Relatório por Aluno</title>
<body>
<h3 align="center">{{ config('app.name') }} - Relatório Aluno: {{ $aluno->nome }}</h3>
<table align="center">
    <tbody>
        <tr>
            <td colspan="2" align="center">{{__('Dados Pessoais')}}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Nome') }}:</td>
            <td align="left">{{ $aluno->nome }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Data Nasc') }}:</td>
            <td align="left">{{ $aluno->data_nasc->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Sexo') }}:</td>
            <td align="left">{{ $aluno->sexo_formatted }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('CPF') }}:</td>
            <td align="left">{{ $aluno->cpf }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">{{__('Endereço')}}</td>
        </tr>
        <tr>
            <td align="right">{{ __('CEP') }}:</td>
            <td align="left">{{ $aluno->endereco->cep }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Logradouro') }}:</td>
            <td align="left">{{ $aluno->endereco->logradouro }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Número') }}:</td>
            <td align="left">{{ $aluno->endereco->numero }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Complemento') }}:</td>
            <td align="left">{{ $aluno->endereco->complemento }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Bairro') }}:</td>
            <td align="left">{{ $aluno->endereco->bairro }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Cidade') }}:</td>
            <td align="left">{{ $aluno->endereco->cidade }}</td>
        </tr>
        <tr>
            <td align="right">{{ __('Estado') }}:</td>
            <td align="left">{{ $aluno->endereco->uf }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">{{__('Matrícula')}}</td>
        </tr>
        @if($aluno->matricula)
            <tr>
                <td align="right">{{ __('Turma') }}:</td>
                <td align="left">{{ $aluno->matricula->turma->nome }}</td>
            </tr>
        @else
            <tr>
                <td colspan="2" align="center">{{__('Aluno não matriculado.')}}</td>
            </tr>
        @endif
    </tbody>
</table>
</body>
</html>
