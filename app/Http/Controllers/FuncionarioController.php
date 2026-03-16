<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use SebastianBergmann\CodeCoverage\Filter;

use function Termwind\render;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {
        $funcionarios = Funcionario::query();

        if ($request->input('CPF')) {
           $funcionarios->where('cpf', $request->input('CPF'));
        }
        if ($request->input('Entrada')) {
           $funcionarios->where('entrada', $request->input('Entrada'));
        }
        if ($request->input('Saida')) {
           $funcionarios->where('saida', $request->input('Saida'));
        }
        if ($request->input('Carga_diaria')) {
           $funcionarios->where('carga_diaria', $request->input('Carga_diaria'));
        }
        if ($request->input('Carga_semanal')) {
           $funcionarios->where('carga_semanal', $request->input('Carga_semanal'));
        }
        if ($request->input('buscaSetor')) {
           $funcionarios->where('setor', $request->input('buscaSetor'));
        }

        $registroFiltrado = $funcionarios->get();


        return view('funcionario.index', compact('registroFiltrado'));
    }

    public function home() {

        $funcionarios = Funcionario::all();

        foreach ($funcionarios as $funcionario) {
            $funcionario-> primeiraEntrada = $funcionario->registro()->where('tipo', 'Entrada')->whereDate('data', date('Y-m-d'))->min('hora');
            $funcionario-> primeiraSaida = $funcionario->registro()->where('tipo', 'Saída')->whereDate('data', date('Y-m-d'))->min('hora');
            $funcionario-> ultimaEntrada = $funcionario->registro()->where('tipo', 'Entrada')->whereDate('data', date('Y-m-d'))->max('hora');
            $funcionario-> ultimaSaida = $funcionario->registro()->where('tipo', 'Saída')->whereDate('data', date('Y-m-d'))->max('hora');
            $ultimoPonto = $funcionario->registro()->whereDate('data', date('Y-m-d'))->orderByDesc('hora')->first();
            $funcionario-> ultimoPonto = $ultimoPonto->tipo ?? 'Saída';
            $funcionario-> pontosHoje = $funcionario->registro()->whereDate('data', date('Y-m-d'))->get();
            $funcionario-> pontosGrupo = $funcionario->registro()->orderBy('data')->get()->groupBy('data');;
            $funcionario-> irregular = false;
            $entradas = $funcionario->registro()->where('tipo', 'Entrada')->whereDate('data', now()->toDateString())->orderBy('created_at')->get()->values();

            $saidas = $funcionario->registro()->where('tipo', 'Saída')->whereDate('data', now()->toDateString())->orderBy('created_at')->get()->values();

            $soma = 0;
            $pares = min($entradas->count(), $saidas->count());

            if (($entradas->count() + $saidas->count()) % 2 !== 0) {
                $funcionario->irregular = true;
            }

            for ($i = 0; $i < $pares; $i++) {
                $inicio = $entradas[$i]->hora;
                $fim = $saidas[$i]->hora;

                if (!$inicio || !$fim) continue;

                $soma += Carbon::parse($inicio)->diffInMinutes(Carbon::parse($fim));
            }

            $totalTrab = gmdate('H:i:s', ($soma * 60));
            $funcionario-> horasTrabalhadas = $totalTrab;
        }


        $ultimasEntradas = $funcionarios->whereNotNull('primeiraEntrada')->take(5)->values();

        $atrasados = $funcionarios
        ->filter(function ($func) {
            $entrada = Carbon::parse($func->entrada);
            $primeiraEntrada = Carbon::parse($func->primeiraEntrada);
            return $entrada->lt($primeiraEntrada);
            })
            ->values();
    
        return view('home', compact('funcionarios', 'ultimasEntradas', 'atrasados'));
    }

    public function create()
    {
        return view('funcionario.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'foto' => ['nullable', 'image', 'max:2048'],
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'max:14'],
            'data_nasc' => ['required', 'date_format:Y-m-d'],
            'carga_diaria' => ['required', 'date_format:H:i'],
            'carga_semanal' => ['required', 'integer'],
            'entrada' => ['required', 'date_format:H:i'],
            'saida' => ['required', 'date_format:H:i'],
            'email' => ['nullable', 'string', 'max:200'],
            'setor' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('funcionarios', 'public');
        } else {
            $data['foto'] = null;
        }

        Funcionario::create($data);

        return back()->with('status', 'Funcionário criado.');
    }

    public function show(Request $request, Funcionario $funcionario)
    {
        $qb = Registro::query();

        if($funcionario){
            $qb->where('funcionario_id', $funcionario->id);
        }

        if ($request->input('inicio') and $request->input('fim')) {
            $in = date('Y-m-d', strtotime($request->input('inicio')));
            $fn = date('Y-m-d', strtotime($request->input('fim')));
            
            $qb->whereBetween('data', [$in, $fn]);
        }

        if ($request->input('periodo')) {
            $periodo = $request->input('periodo');

            if ($periodo == "Matutino") {
                $qb->whereBetween('hora', ['06:00:00' , '11:59:59']);
            }
            elseif ($periodo == "Vespertino") {
                $qb->whereBetween('hora', ['12:00:00' , '17:59:59']);
            }
            elseif($periodo == "Noturno") {
               $qb->where(function($query) 
               {
                    $query->where('hora', '>=', '18:00:00')
                    ->orWhere('hora', '<=', '05:59:59');
               });
            }
        }

        if ($request->input('tipoPonto') && $request->input('tipoPonto') != "Tipo") {
           $qb->where('tipo', $request->input('tipoPonto'));
        }

        $registroFiltrado = $qb->get();

        return view('funcionario.show', compact('funcionario', 'registroFiltrado'));
    }

    public function edit()
    {
        return view();
    }

    public function update(Request $request, Funcionario $funcionario)
    {   
        $data = $request->validate([
            'foto' => ['nullable', 'image', 'max:2048'],
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'max:14'],
            'data_nasc' => ['required', 'date_format:Y-m-d'],
            'carga_diaria' => ['required', 'date_format:H:i'],
            'carga_semanal' => ['required', 'integer'],
            'entrada' => ['required', 'date_format:H:i'],
            'saida' => ['required', 'date_format:H:i'],
            'email' => ['nullable', 'string', 'max:200'],
            'setor' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('funcionarios', 'public');
        } else {
            $data['foto'] = null;
        }

        $funcionario->update($data);
        
        return back();
    }

    public function exportarFuncionario(Request $request, Funcionario $funcionario)
    {
        $funcionarios = $funcionario->get();
        $dompdf = new Dompdf();

        $html = view('funcionario.pdfFuncionario', compact('funcionarios'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="relatorio.pdf"');
    }

    public function exportarRegistro(Funcionario $funcionario)
    {
        $registros = $funcionario->registro()
            ->orderBy('data')
            ->orderBy('hora')
            ->get();

        $dompdf = new Dompdf();
        $html = view('funcionario.pdfRegistro', compact('registros'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="relatorio.pdf"');
    }


    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('home');
    }
}
