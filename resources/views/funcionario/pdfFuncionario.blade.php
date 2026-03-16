{{-- resources/views/pdf/relatorio-funcionarios.blade.php
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Relatório de Funcionários</title>

    <style>
        @page { margin: 24px; }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 4px 0;
        }

        .meta {
            font-size: 11px;
            color: #555;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            vertical-align: top;
        }

        th {
            background: #f3f4f6;
            font-weight: 700;
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            border-top: 1px solid #ddd;
            padding-top: 8px;
            font-size: 10px;
            color: #666;
        }

        /* Quebra de página */
        .page-break { page-break-after: always; }
    </style>
</head>
<body>

    <div class="header">
        <p class="title text-center" style="font-size: 1.3em">AugusTOOL</p>
        <p class="title">Relatório de Funcionários</p>
        <p class="meta">
            Gerado em: {{ now()->format('d/m/Y H:i') }}
            @if(!empty($periodo))
                — Período: {{ $periodo }}
            @endif
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 32%;">Nome</th>
                <th style="width: 18%;">Setor</th>
                <th style="width: 22%;">E-mail</th>
                <th style="width: 14%;">Entrada</th>
                <th style="width: 14%;">Saída</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionario as $f)
                <tr>
                    <td>{{ $f->nome }}</td>
                    <td>{{ $f->setor }}</td>
                    <td>{{ $f->email }}</td>
                    <td class="text-center">{{ $f->entrada }}</td>
                    <td class="text-center">{{ $f->saida }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <span>EFICIÊNCIA FISCAL</span>
        <span style="float:right;">Página <span class="page"></span></span>
    </div>

</body>
</html> --}}

{{-- <!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Funcionários</title>

    <style>
        @page { margin: 18px 18px 22px 18px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #111; }

        .title { font-size: 14px; font-weight: 700; margin: 0 0 10px 0; }
        .meta { font-size: 9px; color: #444; margin-bottom: 10px; }

        table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        th, td { border: 1px solid #333; padding: 6px 5px; vertical-align: middle; }
        th { background: #f0f0f0; font-weight: 700; text-align: center; }

        td { word-wrap: break-word; overflow-wrap: break-word; }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .nowrap { white-space: nowrap; }

        /* larguras fixas (em %) para caber em A4 */
        .w-nome   { width: 22%; }
        .w-setor  { width: 10%; }
        .w-cpf    { width: 11%; }
        .w-ent    { width: 7%; }
        .w-sai    { width: 7%; }
        .w-cdia   { width: 7%; }
        .w-csem   { width: 10%; }

        /* quebra de página mais previsível */
        tr { page-break-inside: avoid; }
    </style>
</head>
<body>
    <p class="title text-center">AugusTOOL</p>
    <div class="title">Lista de Funcionários</div>
    <div class="meta">Gerado em: {{ now()->format('d/m/Y H:i') }}</div>

    <table>
        <thead>
        <tr>
            <th class="w-nome">Funcionário</th>
            <th class="w-setor">Setor</th>
            <th class="w-cpf">CPF</th>
            <th class="w-ent">Entrada</th>
            <th class="w-sai">Saída</th>
            <th class="w-cdia">C. D.</th>
            <th class="w-csem">C. S.</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($funcionarios as $funcionario)
            <tr>
                <td class="text-left  w-nome">{{ $funcionario->nome }}</td>
                <td class="text-center w-setor">{{ $funcionario->setor }}</td>
                <td class="text-center w-cpf nowrap">{{ $funcionario->cpf }}</td>
                <td class="text-center w-ent nowrap">{{ \Carbon\Carbon::parse($funcionario->entrada)->format('H:i') }}</td>
                <td class="text-center w-sai nowrap">{{ \Carbon\Carbon::parse($funcionario->saida)->format('H:i') }}</td>
                <td class="text-center w-cdia nowrap">{{ \Carbon\Carbon::parse($funcionario->carga_diaria)->format('H:i') }}</td>
                <td class="text-center w-csem nowrap">{{ $funcionario->carga_semanal }} horas</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Nenhum funcionário encontrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html> --}}

{{-- resources/views/pdf/relatorio-funcionarios.blade.php --}}
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Relatório de Funcionários</title>

    <style>
        @page { margin: 24px; }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 4px 0;
        }

        .meta {
            font-size: 11px;
            color: #555;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            vertical-align: top;
        }

        th {
            background: #f3f4f6;
            font-weight: 700;
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            border-top: 1px solid #ddd;
            padding-top: 8px;
            font-size: 10px;
            color: #666;
        }

        tr { page-break-inside: avoid; }
    </style>
</head>
<body>

    <div class="header">
        <p class="title text-center">AugusTOOL</p>
        <p class="title">Relatório de Funcionários</p>
        <p class="meta">
            Gerado em: {{ now()->format('d/m/Y H:i') }}
            @if(!empty($periodo))
                — Período: {{ $periodo }}
            @endif
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Setor</th>
                <th>CPF</th>
                <th class="text-center">Entrada</th>
                <th class="text-center">Saída</th>
                <th class="text-center">Carga diária</th>
                <th class="text-center">Carga semanal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $f)
                <tr>
                    <td>{{ $f->nome }}</td>
                    <td>{{ $f->setor }}</td>
                    <td>{{ $f->cpf }}</td>
                    <td class="text-center">
                        {{ $f->entrada ? \Carbon\Carbon::parse($f->entrada)->format('H:i') : '-' }}
                    </td>
                    <td class="text-center">
                        {{ $f->saida ? \Carbon\Carbon::parse($f->saida)->format('H:i') : '-' }}
                    </td>
                    <td class="text-center">
                        {{ $f->carga_diaria ? \Carbon\Carbon::parse($f->carga_diaria)->format('H:i') : '-' }}
                    </td>
                    <td class="text-center">
                        {{ $f->carga_semanal ? $f->carga_semanal.' horas' : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum funcionário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <span>AugusTOOL</span>
        <span style="float:right;">Página <span class="page"></span></span>
    </div>

</body>
</html>

