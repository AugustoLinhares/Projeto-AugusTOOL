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
            <div class="modal fade" tabindex="-1" id="editarReg">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 id="titulo" class="modal-title">Editar ponto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <div id="lista" class="col px-3">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" style="background: #51b330; color:white" class="btn">Salvar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="modalPonto">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <form id="formPonto" method="POST" action="{{ route ('registro.store') }}">
                            @csrf 
                            <div class="modal-header">
                                <h5 id="tituloPontoFunc" class="modal-title">Registrar ponto - </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col px-3">
                                        <div class="row form-floating pb-3">
                                            <input name="hora" id="hora" type="text" class="form-control" readonly>
                                            <label for="hora" style="font-size: 0.85em">Horário do ponto</label>
                                        </div>

                                        <div class="row form-floating">
                                            <select name="tipo" id="tipo" class="form-select">
                                                <option value="Entrada">Entrada</option>
                                                <option value="Saída">Saída</option>
                                            </select>
                                            <label for="tipo" style="font-size: 0.85em">Tipo do ponto</label>
                                        </div>

                                        <input name="funcionario_id" type="hidden" id="funcionario_id">
                                        <input name="data" type="hidden" id="data" value="{{ date("Y-m-d") }}">
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

            <div class="modal fade" tabindex="-1" id="modalFuncionario">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;">
                    <div class="modal-content">

                        <form method="POST" action="{{ route ('funcionario.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Novo funcionário</h5>
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
                                                    <span id="hintFoto" style="color:#6c757d;font-size:11px;text-align:center;line-height:1.1;">
                                                        Clique<br>ou arraste
                                                    </span>

                                                    <img id="previewFoto" alt="Preview" style="display:none;width:100%;height:100%;object-fit:cover;">
                                                </div>

                                                <input id="inputFoto" name="foto" type="file" accept="image/*" style="display:none;">
                                            </div>

                                            <div class="d-flex flex-row justify-content-center pt-3">
                                                <span style="color: #6c757d">Imagem do funcionário</span>
                                            </div>

                                            <div class="d-flex flex-row py-3">
                                                <div class="input-group">
                                                    <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome">
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <input name="email" id="email" type="text" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row py-3">
                                                <div class="input-group">
                                                    <input type="text" name="carga_diaria" id="carga_diaria" style="width: 110px" class="form-control time" placeholder="Carga diária">
                                                </div>
                                                <div class="input-group px-3">
                                                    <input type="text" name="carga_semanal" id="carga_semanal" style="width: 130px" class="form-control" placeholder="Carga semanal">
                                                </div>
                                                <div class="input-group pe-3">
                                                    <input type="text" name="entrada" id="entrada" style="width: 70px" class="form-control time" placeholder="Entrada">
                                                </div>
                                                <div class="input-group text-center">
                                                    <input type="text" name="saida" id="saida" style="width: 70px" class="form-control time" placeholder="Saída">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <input type="date" name="data_nasc" style="width: 170px;" id="data_nasc" class="form-control">
                                                </div>
                                                <div class="input-group px-3">
                                                    <input id="cpf" name="cpf" style="width: 150px" type="text" class="form-control cpf" placeholder="CPF">
                                                </div>
                                                <div style="display: inline">
                                                    <select name="setor" style="width: 180px" class="form-select" id="">
                                                        <option selected>Setor</option>
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

            <div class="flex justify-content-start mt-5">

                <div class="row mb-2">

                    <div class="col">
                        <div class="card d-flex flex-column mb-4 box-shadow shadow" style="background: #fafbff">
                            <div class="card-body d-flex flex-row justify-content-between">

                                <div class="d-flex flex-column">
                                    <span style="font-size:1.5em">Funcionários</span>
                                </div>

                                <div class="d-flex flex-column justify-content-center">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFuncionario">Novo funcionário</button>
                                </div>

                            </div>

                            @if (!$funcionarios->isEmpty())
                                @foreach ($funcionarios as $funcionario)
                                    <div class="card-body">
                                        <div class="card card-body shadow-sm">

                                            <div>
                                                <div class="d-flex flex-md-row justify-content-between pb-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex flex-row">
                                                            @if($funcionario->foto)
                                                            <img class="me-3" src="{{ asset('storage/'.$funcionario->foto) }}" alt="Foto"
                                                                style="width:30px;height:30px;object-fit:cover;border-radius:50%;">
                                                            @else
                                                            <img class="me-3" src="{{  asset('avatarDefault.svg') }}" alt="Sem foto"
                                                                style="width:30px;height:30px;object-fit:cover;border-radius:50%;">
                                                            @endif
                                                            <a href="{{ route('funcionario.show', compact('funcionario')) }}" style="text-decoration: none; color: black; font-size:1.2em;">{{$funcionario->nome}}</a>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span style="font-size:1.2em">{{$funcionario->setor}}</span>
                                                    </div>
                                                    
                                                    
                                                </div>

                                                <table class="table table-bordered table-striped text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 180px">Primeiro turno</th>
                                                            <th scope="col" style="width: 180px">Último turno</th>
                                                            <th scope="col" style="width: 150px">Total trabalhado</th>
                                                            <th scope="col" style="width: 200px">Opções</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>{{ !empty($funcionario->primeiraEntrada) ? date('H:i', strtotime($funcionario->primeiraEntrada)) : "-----" }} |  {{ !empty($funcionario->primeiraSaida) ? date('H:i', strtotime($funcionario->primeiraSaida)) : "-----" }}</td>
                                                            <td>{{ !empty($funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : "-----" }}  |  {{ (!empty($funcionario->primeiraEntrada) && $funcionario->ultimaSaida >= $funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : '-----' }}</td>
                                                            <td> {{ $funcionario->horasTrabalhadas }}</td>
                                                            <td style="width: 200px">
                                                                <button style="font-size:0.9em;" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#modalPonto" data-id="{{$funcionario->id}}" data-nome="{{$funcionario->nome}}" data-tipo="{{$funcionario->ultimoPonto}}">Registrar ponto</button>
                                                            </td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            @else
                                <div class="card-body text-center">
                                    <span class="card card-body" style="background-color: #f2f2f2">
                                        Nenhum funcionário encontrado.
                                    </span>
                                </div>  
                            @endif
                        </div>
                    </div>

                    <div class="d-flex flex-column" style="width: 35%;">
                        <div class="card mb-4 shadow mb-3" style="background: #fafbff">
                            <div class="card-body">

                                <p style="font-size:1.5em">Últimos funcionários a entrar</p>

                                <div>
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50%">Funcionário</th>
                                                <th scope="col">Primeiro turno</th>
                                                <th scope="col">Último turno</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(!$funcionarios->isEmpty())
                                                @foreach ($ultimasEntradas as $funcionario)

                                                <tr>
                                                    <td class="text-truncate" style="max-width: 200px">{{ $funcionario->nome }}</td>
                                                    <td>{{ !empty($funcionario->primeiraEntrada) ? date('H:i', strtotime($funcionario->primeiraEntrada)) : "-----" }} |  {{ !empty($funcionario->primeiraSaida) ? date('H:i', strtotime($funcionario->primeiraSaida)) : "-----" }}</td>
                                                    <td>{{ !empty($funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : "-----" }}  |  {{ (!empty($funcionario->primeiraEntrada) && $funcionario->ultimaSaida >= $funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : '-----' }}</td>
                                                </tr>

                                                @endforeach
                                            
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">Nenhum funcionário encontrado.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4 shadow" style="background: #fafbff">

                            <div class="card-body">
                                <p style="font-size:1.5em">Funcionários atrasados</p>

                                <div>
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50%">Funcionário</th>
                                                <th scope="col">Primeiro turno</th>
                                                <th scope="col">Último turno</th>
                                            </tr>
                                        </thead>
                                        
                                            
                                        <tbody>
                                            @if(!$funcionarios->isEmpty())
                                                @foreach ($atrasados as $funcionario)
                                                <tr>
                                                    <td class="text-truncate" style="max-width: 200px">{{ $funcionario->nome }}</td>
                                                    <td>{{ !empty($funcionario->primeiraEntrada) ? date('H:i', strtotime($funcionario->primeiraEntrada)) : "-----" }} |  {{ !empty($funcionario->primeiraSaida) ? date('H:i', strtotime($funcionario->primeiraSaida)) : "-----" }}</td>
                                                    <td>{{ !empty($funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : "-----" }}  |  {{ (!empty($funcionario->primeiraEntrada) && $funcionario->ultimaSaida >= $funcionario->ultimaEntrada) ? date('H:i', strtotime($funcionario->ultimaEntrada)) : '-----' }}</td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">Nenhum funcionário encontrado.</td>
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

            document.addEventListener('show.bs.modal', function (event) {
                if (event.target.id !== 'modalPonto') return;

                let botao = $(event.relatedTarget);
                
                const horaFunc = event.target.querySelector('#hora');
                if (horaFunc) {
                    horaFunc.value = new Date().toLocaleTimeString('pt-BR', { hour12: false });
                }

                let nome = botao.data('nome');
                const nomeFunc = document.getElementById("tituloPontoFunc");
                nomeFunc.textContent = "Registrar ponto - " + nome;

                let id = botao.data('id'); 
                const idFunc = document.getElementById("funcionario_id");
                idFunc.value = id;

                let tipo = botao.data('tipo');
                const tipoFunc = document.getElementById("tipo");
                if (tipo == "Entrada") tipoFunc.value="Saída";
                else tipoFunc.value="Entrada";
            });

            document.getElementById('editarReg').addEventListener('show.bs.modal', function (event) {
                if (event.target.id !== 'editarReg') {
                    return;
                }
                    
                const botao = event.relatedTarget;

                this.querySelector('#formEditarReg').action = botao.getAttribute('data-url');

                this.querySelector('#lista').innerHTML = botao.getAttribute('data-lista') ?? '';
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