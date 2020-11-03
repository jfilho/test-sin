<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Aluno;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function alunos()
    {
        $aluno = null;
        if (request()->get('id_aluno')) {
            $aluno = Aluno::find(request()->get('id_aluno'));
        }

        if (isset($aluno) && request()->get('export')) {
            $pdf = PDF::loadView('relatorio.pdf.alunos', compact('aluno'));
            return $pdf->download('aluno-' . $aluno->id .'.pdf');
        }

        return view('relatorio.alunos', compact('aluno'));
    }

    public function turmas()
    {
        $values = DB::table('turmas')
            ->selectRaw('turmas.nome, (select count(0) from matriculas where id_turma = turmas.id) as total')
            ->orderBy('turmas.nome')
            ->get();

        if (request()->get('export')) {
            $pdf = PDF::loadView('relatorio.pdf.turmas', compact('values'));
            return $pdf->download('turmas.pdf');
        }

        return view('relatorio.turmas', compact('values'));
    }
}
