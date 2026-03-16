@extends('layout.layout')

@section('title', 'Home Page')

@section('content')
@push('styles')
@endpush

<form method="POST" action="{{ route ('funcionario.store') }}">
    @csrf
    <div class="form-group">
        <div class="d-flex justify-content-center p-5">

            <div class="card flex-column box-shadow shadow" style="background: #fafbff">

                <div class="card-body d-flex flex-row align-items-end">

                    <div class="card-body flex-column">

                        <div class="d-flex flex-row justify-content-center">

                            <input name="foto" value="Foto" class="d-flex" style="height: 130px; width: 130px; background-color:#ffffff; border-radius:50%; border: 1px dashed #6c757d;"></input>

                        </div>

                        <div class="d-flex flex-row justify-content-center pt-3">

                            <span style="color: #6c757d">Imagem do funcionário</span>

                        </div>

                        <div class="d-flex flex-row py-4">

                            <div class="input-group">
                                <input id="nome" type="text" class="form-control" placeholder="Nome" aria-label="nome" name="nome" aria>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-row">
                            <div class="input-group">
                                <input id="email" type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email" aria>
                            </div>
                        </div>

                        <div class="d-flex flex-row py-4">
                            <div class="input-group">
                                <input type="text" name="carga_diaria" style="width: 110px" id="carga_diaria" class="form-control" placeholder="Carga diária" aria-label="email" aria>
                            </div>
                            <div class="input-group px-4">
                                <input type="text" name="carga_semanal" style="width: 130px" id="carga_semanal" class="form-control" placeholder="Carga semanal" aria-label="email" aria>
                            </div>
                            <div class="input-group">
                                <input type="text" name="data_nasc" style="width: 180px" id="data_nasc" class="form-control" placeholder="Data de nascimento" aria-label="email" aria>
                            </div>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="input-group pe-4">
                                <input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF" aria-label="cpf" aria>
                            </div>
                            <div style="display: inline">
                                <select name="setor" style="width: 200px" class="form-select" id="">
                                      <option selected>Selecione um setor</option>
                                    <option value="Suporte">Suporte</option>
                                    <option value="Desenvolvimento">Desenvolvimento</option>
                                    <option value="Comercial">Comercial</option>
                                    <option value="Administrativo">Administrativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button method="POST" type="submit">Mi bombo</button>
            </div>
        </div>
    </div>
</form>

@push('js')
@endpush
@endsection