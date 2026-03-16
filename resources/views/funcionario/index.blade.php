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
            <div class="mt-4">
                <div class="row mb-4">
                    <div class="col">

                        <div class="card card-body shadow" style="background: #fafbff">
                            <div class="d-flex align-items-center justify-content-between">
                                <span style="font-size:1.5em" class="mb-3">Filtros</span>
                            </div>

                            <form action="{{ route('funcionario.index')}}" method="GET">
                                <div class="row g-3">

                                    <div class="col-4">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <input id="cpf" name="CPF" type="text" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="entrada">Entrada</label>
                                        <input id="entrada" name="Entrada" type="text" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="saida">Saída</label>
                                        <input id="saida" name="Saida" type="text" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="carga_diaria">Carga diária</label>
                                        <input id="carga_diaria" name="Carga_diaria" type="text" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="carga_semanal">Carga semanal</label>
                                        <input id="carga_semanal" name="Carga_semanal" type="text" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="buscaSetor">Setor</label>
                                        <select name="buscaSetor" id="buscaSetor" class="form-select">
                                            <option value="" selected>Setor</option>
                                            <option value="Suporte">Suporte</option>
                                            <option value="Desenvolvimento">Desenvolvimento</option>
                                            <option value="Comercial">Comercial</option>
                                            <option value="Administrativo">Administrativo</option>
                                        </select>
                                    </div>

                                    <div class="col-12 d-flex gap-2 pt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Filtrar
                                    </button>

                                    <a href="{{ route('funcionario.index') }}" class="btn btn-outline-secondary">
                                        Limpar
                                    </a>

                                    <a href="{{ route('pdfFuncionario', compact('registroFiltrado')) }}" target="_blank" class="btn btn-outline-secondary pe-3">Relatório (PDF)</a>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="card d-flex flex-column mb-4 shadow" style="background: #fafbff">

                            <div class="card-body d-flex flex-row justify-content-between">

                                <div class="d-flex flex-column">
                                    <span style="font-size:1.5em">Funcionários</span>
                                </div>
                                
                                <div class="d-flex flex-column">
                                    <div class="input-group">          
                                        <input name="barraPesquisa" id="barraPesquisa" type="text" class="form-control" placeholder="Buscar">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                </div>

                            </div>


                            {{-- @if (!$registroFiltrado->isEmpty())
                                @foreach ($registroFiltrado as $funcionario)
                                    <div class="mostrarFuncionario card-body">
                                        <div class="card card-body">
                                            
                                            <div class="d-flex flex-row justify-content-between mb-3">
                                                <a href="{{ route('funcionario.show', ['funcionario' => $funcionario]) }}" style="text-decoration: none; color: black; font-size:1.2em;">{{$funcionario->nome}}</a>
                                                <a style="font-size:1.2em">{{$funcionario->setor}}</a>
                                            </div>

                                            <div style="width: 100%">
                                                <table class="table table-bordered table-striped text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 200px">Setor</th>
                                                            <th scope="col" style="width: 300px">E-mail</th>
                                                            <th scope="col" style="width: 180px">CPF</th>
                                                            <th scope="col" style="width: 130px">Entrada</th>
                                                            <th scope="col" style="width: 130px">Saída</th>
                                                            <th scope="col" style="width: 160px">Carga diária</th>
                                                            <th scope="col" style="width: 160px">Carga semanal</th>
                                                            <th scope="col">Data de nascimento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 200px">{{ $funcionario->setor }}</td>
                                                            <td style="width: 300px">{{ $funcionario->email }}</td>
                                                            <td style="width: 180px">{{ $funcionario->cpf }}</td>
                                                            <td style="width: 130px">{{ date('H:i', strtotime($funcionario->entrada)) }}</td>
                                                            <td style="width: 130px">{{ date('H:i', strtotime($funcionario->saida)) }}</td>
                                                            <td style="width: 160px">{{ date('H:i', strtotime($funcionario->carga_diaria)) }}</td>
                                                            <td style="width: 160px">{{ $funcionario->carga_semanal }} horas</td>
                                                            <td>{{ date('d/m/Y', strtotime($funcionario->data_nasc)) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>  
                                @endforeach
                            
                            @else
                            
                            @endif --}}



                            
                            <div class="card-body" style="width: 100%">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 200px">Funcionário</th>
                                            <th scope="col" style="width: 200px">Setor</th>
                                            <th scope="col" style="width: 300px">E-mail</th>
                                            <th scope="col" style="width: 180px">CPF</th>
                                            <th scope="col" style="width: 100px">Entrada</th>
                                            <th scope="col" style="width: 100px">Saída</th>
                                            <th scope="col" style="width: 130px">Carga diária</th>
                                            <th scope="col" style="width: 130px">Carga semanal</th>
                                            <th scope="col">Data de nascimento</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mostrarFuncionario">
                                        @if (!$registroFiltrado->isEmpty())
                                            @foreach ($registroFiltrado as $funcionario)
                                            <tr>
                                                <td style="width: 200px"><a href="{{ route('funcionario.show', ['funcionario' => $funcionario]) }}" style="color: black;">{{$funcionario->nome}}</a></th>
                                                <td style="width: 200px">{{ $funcionario->setor }}</td>
                                                <td style="width: 300px">{{ $funcionario->email }}</td>
                                                <td style="width: 180px">{{ $funcionario->cpf }}</td>
                                                <td style="width: 100px">{{ date('H:i', strtotime($funcionario->entrada)) }}</td>
                                                <td style="width: 100px">{{ date('H:i', strtotime($funcionario->saida)) }}</td>
                                                <td style="width: 130px">{{ date('H:i', strtotime($funcionario->carga_diaria)) }}</td>
                                                <td style="width: 130px">{{ $funcionario->carga_semanal }} horas</td>
                                                <td>{{ date('d/m/Y', strtotime($funcionario->data_nasc)) }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center">Nenhum funcionário encontrado.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                                
                        </div>
                    </div>
                </div>

            </div>

        </main>
        @include('layout.footer')

        <script>
            $(document).ready(function(){
                $("#barraPesquisa").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#mostrarFuncionario tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </body>

</html>