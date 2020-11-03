<html>
<title>{{ config('app.name') }} - Relatório por Turmas</title>
<body>
<h3 align="center">{{ config('app.name') }} - Relatório por Turmas</h3>
<table align="center">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th class="mobile-hide" scope="col">Total de alunos</th>
    </tr>
    </thead>
    <tbody>
    @forelse($values as $value)
        <tr>
            <td align="left">{{ $value->nome }}</td>
            <td align="right">{{ $value->total }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Nenhum registro encontrado.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
