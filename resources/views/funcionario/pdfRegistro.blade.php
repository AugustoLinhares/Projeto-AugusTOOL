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

        /* Quebra de página */
        .page-break { page-break-after: always; }
    </style>
</head>
<body>

    <div class="header">
        <p class="title text-center">AugusTOOL</p>
        <p class="title">Relatório de Registros</p>
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
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo</th>
            </tr>
        </thead>
        
        <tbody>
            @forelse($registros as $f)
                <tr>
                    <td>{{ $f->data ? \Carbon\Carbon::parse($f->data)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $f->hora }}</td>
                    <td>{{ $f->tipo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhum registro encontrado.</td>
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