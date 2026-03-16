<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
        @include('layout.header')
        <main class="container-fluid min-vh-100" style="width: 85%">
            <div class="modal fade" tabindex="-1" id="deletarReg">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="formDeletarReg" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 id="titulo" class="modal-title">Tem certeza que deseja excluir este ponto?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col px-3">
                                        <div class="form-floating mb-3">
                                            <input name="funcionario" id="funcionario" value="{{ $funcionario->nome }}" type="text" class="form-control" readonly>
                                            <label for="funcionario" style="font-size: 0.85em">Funcionário</label>
                                        </div>

                                        <div class="form-floating">
                                            <input name="hora" id="hora" type="text" class="form-control" readonly>
                                            <label for="hora" style="font-size: 0.85em">Horário do ponto</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input name="tipo" id="tipo" type="text" class="form-control" readonly>
                                            <label for="tipo" style="font-size: 0.85em">Tipo do ponto</label>
                                        </div>

                                        <div class="form-floating">
                                            <input name="data" id="data" type="text" class="form-control" readonly>
                                            <label for="data" style="font-size: 0.85em">Data do ponto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" style="background:red; color:white" class="btn">Excluir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="editarReg">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <form id="formEditarReg" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 id="titulo" class="modal-title">Editar ponto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col px-3">
                                        <div class="form-floating mb-3">
                                            <input id="funcionario" value="{{ $funcionario->nome }}" type="text" class="form-control" readonly>
                                            <label for="funcionario" style="font-size: 0.85em">Funcionário</label>
                                        </div>

                                        <div class="form-floating">
                                            <input name="hora" id="hora" type="text" class="form-control">
                                            <label for="hora" style="font-size: 0.85em">Horário do ponto</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <select name="tipo" id="tipo" class="form-select">
                                                <option value="Entrada">Entrada</option>
                                                <option value="Saída">Saída</option>
                                            </select>
                                            <label for="tipo" style="font-size: 0.85em">Tipo do ponto</label>
                                        </div>

                                        <div class="form-floating">
                                            <input name="data" id="data" type="date" class="form-control">
                                            <label for="data" style="font-size: 0.85em">Data do ponto</label>
                                        </div>

                                        <input name="funcionario_id" value="{{ $funcionario->id }}" type="hidden" id="funcionario_id">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" style="background: #51b330; color:white" class="btn">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="deletarFunc">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <form id="formDeletarFunc" method="POST" action="{{ route('funcionario.destroy', $funcionario->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 id="titulo" class="modal-title">Tem certeza que deseja excluir este funcionário?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col px-3">
                                        <div class="form-floating mb-3">
                                            <input name="funcionario" id="funcionario" value="{{ $funcionario->nome }}" type="text" class="form-control" readonly>
                                            <label for="funcionario" style="font-size: 0.85em">Funcionário</label>
                                        </div>

                                        <div class="form-floating">
                                            <input name="hora" id="hora" value="{{ $funcionario->setor }}" type="text" class="form-control" readonly>
                                            <label for="hora" style="font-size: 0.85em">Setor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" style="background:red; color:white" class="btn">Excluir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="editarFunc">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;">
                    <div class="modal-content">

                        <form method="POST" action="{{ route('funcionario.update', compact('funcionario')) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Editar funcionário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="d-flex flex-row align-items-end justify-content-center">
                                        <div class="flex-column">

                                            <div class="d-flex flex-row justify-content-center">
                                                <div id="dropzoneFoto"
                                                    class="d-flex align-items-center justify-content-center"
                                                    style="height:130px;width:130px;background:#fff;border-radius:50%;border:1px dashed #6c757d;cursor:pointer;overflow:hidden;">

                                                    @if($funcionario->foto)
                                                    <img class="me-3" src="{{ asset('storage/'.$funcionario->foto) }}" alt="Foto"
                                                        style="width:100px;height:100px;object-fit:cover;border-radius:50%;">
                                                    @else
                                                        <span id="hintFoto" style="color:#6c757d;font-size:11px;text-align:center;line-height:1.1;">
                                                            Clique<br>ou arraste
                                                        </span>
                                                    @endif
                                                    
                                                    <img id="previewFoto" alt="Preview" style="display:none;width:100%;height:100%;object-fit:cover;">
                                                </div>

                                                <input id="inputFoto" name="foto" type="file" accept="image/*" style="display:none;">
                                            </div>

                                            <div class="d-flex flex-row justify-content-center pt-3">
                                                <span style="color: #6c757d">Imagem do funcionário</span>
                                            </div>

                                            <div class="d-flex flex-row py-3">
                                                <div class="input-group">
                                                    <input name="nome" value="{{ $funcionario->nome }}" id="nome" type="text" class="form-control" placeholder="Nome">
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <input name="email" value="{{ $funcionario->email }}" id="email" type="text" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row py-3">
                                                <div class="input-group">
                                                    <input type="text" value="{{ date('H:i', strtotime($funcionario->carga_diaria)) }}" name="carga_diaria" id="carga_diaria" style="width: 110px" class="form-control time" placeholder="Carga diária">
                                                </div>
                                                <div class="input-group px-3">
                                                    <input type="text" value="{{ $funcionario->carga_semanal }}" name="carga_semanal" id="carga_semanal" style="width: 130px" class="form-control" placeholder="Carga semanal">
                                                </div>
                                                <div class="input-group pe-3">
                                                    <input type="text" value="{{ date('H:i', strtotime($funcionario->entrada)) }}" name="entrada" id="entrada" style="width: 70px" class="form-control time" placeholder="Entrada">
                                                </div>
                                                <div class="input-group text-center">
                                                    <input type="text" value="{{ date('H:i', strtotime($funcionario->saida)) }}" name="saida" id="saida" style="width: 70px" class="form-control time" placeholder="Saída">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <input type="date" value="{{ date('Y-m-d', strtotime($funcionario->data_nasc)) }}" name="data_nasc" style="width: 170px" id="data_nasc" class="form-control" placeholder="Data de nascimento">
                                                </div>
                                                <div class="input-group px-3">
                                                    <input id="cpf" value="{{ $funcionario->cpf }}" name="cpf" style="width: 150px" type="text" class="form-control cpf" placeholder="CPF">
                                                </div>
                                                <div style="display: inline">
                                                    <select name="setor" style="width: 180px" class="form-select" id="setor">
                                                        <option value="Suporte">Suporte</option>
                                                        <option value="Desenvolvimento">Desenvolvimento</option>
                                                        <option value="Comercial">Comercial</option>
                                                        <option value="Administrativo">Administrativo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" style="background:#51b330; color:white" class="btn">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-2 mt-4">
                <div class="col">
                    <div class="card d-flex flex-column mb-4 shadow" style="background: #fafbff">
                        <div class="card-body d-flex flex-row justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row align-items-center">
                                
                                    @if($funcionario->foto)
                                    <img class="me-3" src="{{ asset('storage/'.$funcionario->foto) }}" alt="Foto"
                                        style="width:60px;height:60px;object-fit:cover;border-radius:50%;">
                                    @else
                                    <img class="me-3" src="{{  asset('avatarDefault.svg') }}" alt="Sem foto"
                                        style="width:60px;height:60px;object-fit:cover;border-radius:50%;">
                                    @endif
                                
                                    <span style="font-size:2em">{{ $funcionario->nome }}</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row">
                                    <button class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#editarFunc" style="font-size:0.9em;" data-setor="{{$funcionario->setor}}">Editar</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deletarFunc" style="font-size:0.9em;">Excluir funcionário</button>
                                </div>
                            </div>
                        </div>
     
                        <div class="card-body d-flex flex-row" style="background: #fafbff">
                            <div class="card card-body">

                                <div class="d-flex flex-column mb-3">
                                    <span style="font-size:1.5em">Informações do funcionário</span>
                                </div>

                                <div style="width: 100%">
                                    <div class="col">

                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label class="form-label" for="setorFunc"><strong>Setor: </strong></label>
                                                <span id="setorFunc">{{ $funcionario->setor }}</span>
                                            </div>

                                            <div class="col-2">
                                                <label class="form-label" for="entradaFunc"><strong>Entrada: </strong></label>
                                                <span id="setorFunc">{{ date('H:i', strtotime($funcionario->entrada)) }}</span>
                                            </div>

                                            <div class="col-2">
                                                <label class="form-label" for="saidaFunc"><strong>Saída: </strong></label>
                                                <span id="setorFunc">{{ date('H:i', strtotime($funcionario->saida)) }}</span>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label" for="emailFunc"><strong>E-mail: </strong></label>
                                                <span id="setorFunc">{{ $funcionario->email }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                             <div class="col-2">
                                                <label class="form-label" for="cpfFunc"><strong>CPF: </strong></label>
                                                <span id="setorFunc">{{ $funcionario->cpf }}</span>
                                            </div>

                                            <div class="col-2">
                                                <label class="form-label" for="cargaDiariaFunc"><strong>Carga diária: </strong></label>
                                                <span id="setorFunc">{{ date('H:i', strtotime($funcionario->entrada)) }}</span>
                                            </div>
                                            
                                            <div class="col-2">
                                                <label class="form-label" for="cargaSemanalFunc"><strong>Carga semanal: </strong></label>
                                                <span id="setorFunc">{{ $funcionario->carga_semanal }} horas</span>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label" for="setorFunc"><strong>Data de nascimento: </strong></label>
                                                <span id="setorFunc">{{ date('d/m/Y', strtotime($funcionario->data_nasc)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="background: #fafbff">
                            <div class="card card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span style="font-size:1.5em" class="mb-3">Filtros</span>
                                </div>
                                
                                <form action="{{ route('funcionario.show', compact('funcionario')) }}" method="GET">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-label" for="cpf">Data início</label>
                                            <input type="date" id="inicio" class="form-control" name='inicio'>
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label" for="cpf">Data fim</label>
                                            <input type="date" id="fim" class="form-control" name='fim'>   
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label" for="tipoPonto">Tipo</label>
                                            <select name="tipoPonto" id="tipoPonto" class="form-select">
                                                <option value ="" selected>Tipo</option>
                                                <option value="Entrada">Entrada</option>
                                                <option value="Saída">Saída</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label" for="periodo">Período de tempo</label>
                                            <select name="periodo" id="tipoPonto" class="form-select">
                                                <option selected>Período</option>
                                                <option value="Matutino">Matutino</option>
                                                <option value="Vespertino">Vespertino</option>
                                                <option value="Noturno">Noturno</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex d-flex gap-2 pt-3">
                                        <button type="submit" class="btn btn-primary">
                                            Filtrar
                                        </button>

                                        <a href="{{ route('funcionario.show', compact('funcionario')) }}" class="btn btn-outline-secondary">
                                            Limpar
                                        </a>

                                        <a href="{{ route('pdfRegistro', $funcionario) }}" target="_blank" class="btn btn-outline-secondary">
                                            Relatório (PDF)
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card card-body shadow-sm">
                                <div>
                                    <div style="width: 100%">
                                        <div class="pb-3">
                                            <span style="font-size:1.5em">Pontos registrados</span>
                                        </div>

                                        <table class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Hora</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Opções</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (!$funcionario->registro->isEmpty())
                                                    @foreach ($registroFiltrado as $reg)
                                                        <tr>
                                                            <td>
                                                                {{ date('d/m/Y', strtotime($reg->data)) }}
                                                            </td>
                                                            <td>
                                                                {{ $reg->hora }}
                                                            </td>
                                                            <td>
                                                                {{ $reg->tipo }}
                                                            </td>
                                                            <td>
                                                                <button style="font-size:0.9em;" class="btn btn-secondary me-3" data-data="{{ date('d/m/Y', strtotime($reg->data)) }}" data-tipo="{{ $reg->tipo }}" data-hora="{{ $reg->hora }}" data-bs-toggle="modal" data-bs-target="#deletarReg" data-url="{{ route('registro.destroy', $reg->id) }} ">Excluir ponto</button>
                                                                <button style="font-size:0.9em;" class="btn btn-secondary" data-data="{{ $reg->data }}" data-tipo="{{ $reg->tipo }}" data-hora="{{ $reg->hora }}" data-bs-toggle="modal" data-bs-target="#editarReg" data-url="{{ route('registro.update', $reg) }}" style="font-size:0.9em">Editar ponto</button>
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center">Nenhum registro encontrado.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </main>
        @include('layout.footer')

        <script>
            $(document).ready(function(){
                $('.date').mask('00/00/0000');
                $('.time').mask('00:00');
                $('.date_time').mask('00/00/0000 00:00:00');
                $('.cep').mask('00000-000');
                $('.phone').mask('0000-0000');
                $('.phone_with_ddd').mask('(00) 0000-0000');
                $('.phone_us').mask('(000) 000-0000');
                $('.mixed').mask('AAA 000-S0S');
                $('.cpf').mask('000.000.000-00');
                $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('.money').mask('000.000.000.000.000,00', {reverse: true});
                $('.money2').mask("#.##0,00", {reverse: true});
                $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                    'Z': {
                        pattern: /[0-9]/, optional: true
                    }
                    }
                });
                $('.ip_address').mask('099.099.099.099');
                $('.percent').mask('##0,00%', {reverse: true});
                $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
                $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
                $('.fallback').mask("00r00r0000", {
                    translation: {
                        'r': {
                        pattern: /[\/]/,
                        fallback: '/'
                        },
                        placeholder: "__/__/____"
                    }
            });

            $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
            });

            document.getElementById('deletarReg').addEventListener('show.bs.modal', function (event) {
            if (event.target.id !== 'deletarReg') {
                return;
            }
            
            const botao = event.relatedTarget;

            this.querySelector('#formDeletarReg').action = botao.getAttribute('data-url');

            this.querySelector('#hora').value = botao.getAttribute('data-hora') ?? '';
            this.querySelector('#tipo').value = botao.getAttribute('data-tipo') ?? '';
            this.querySelector('#data').value = botao.getAttribute('data-data') ?? '';

            });

            document.addEventListener('show.bs.modal', function (event) {
            if (event.target.id !== 'editarFunc') {
                return;
            }
            
            var botao = event.relatedTarget;

            var setor = botao.data('setor');
            const setorFunc = document.getElementById("setor");
            setorFunc.value = setor;

            });

            document.getElementById('editarReg').addEventListener('show.bs.modal', function (event) {
            if (event.target.id !== 'editarReg') {
                return;
            }
            
            const botao = event.relatedTarget;

            this.querySelector('#formEditarReg').action = botao.getAttribute('data-url');

            this.querySelector('#hora').value = botao.getAttribute('data-hora') ?? '';
            this.querySelector('#tipo').value = botao.getAttribute('data-tipo') ?? '';
            this.querySelector('#data').value = botao.getAttribute('data-data') ?? '';

            });

        </script>

        <script>
            const dropzone = document.getElementById('dropzoneFoto');
            const input = document.getElementById('inputFoto');
            const preview = document.getElementById('previewFoto');
            const hint = document.getElementById('hintFoto');

            function showPreview(file) {
                if (!file || !file.type.startsWith('image/')) return;
                const url = URL.createObjectURL(file);
                preview.src = url;
                preview.style.display = 'block';
                hint.style.display = 'none';
            }

            dropzone.addEventListener('click', () => input.click());
            input.addEventListener('change', (e) => {
                const file = e.target.files?.[0];
                showPreview(file);
            });

            ['dragenter', 'dragover'].forEach(evt => {
                dropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.style.borderColor = '#111';
                });
            });

            ['dragleave', 'drop'].forEach(evt => {
                dropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.style.borderColor = '#6c757d';
                });
            });

            dropzone.addEventListener('drop', (e) => {
                const file = e.dataTransfer.files?.[0];
                if (!file) return;

                const dt = new DataTransfer();
                dt.items.add(file);
                input.files = dt.files;

                showPreview(file);
            });
        </script>
    </body>
</html>