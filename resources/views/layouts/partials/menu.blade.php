<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('alunos.index') }}">{{ __('Alunos') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('turmas.index') }}">{{ __('Turmas') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">{{ __('Matrículas') }}</a>
    </li>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Relatórios') }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">{{ __('Aluno') }}</a>
            <a class="dropdown-item" href="#">{{ __('Turmas') }}</a>
        </div>
    </li>
</ul>
