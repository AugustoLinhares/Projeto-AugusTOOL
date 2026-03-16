<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\RegistroController;

use App\Models\Funcionario;
use App\Models\Registro;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {return redirect()->route('home');});
Route::get('/export-pdf-func', [FuncionarioController::class, 'exportarFuncionario'])->name('pdfFuncionario');
// Route::get('/export-pdf-reg', [FuncionarioController::class, 'exportarRegistro'])->name('pdfRegistro');
Route::get('/export-pdf-reg/{funcionario}', [FuncionarioController::class, 'exportarRegistro'])->name('pdfRegistro');
Route::get('/home',[FuncionarioController::class, 'home'] )->name('home');
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios');
Route::get('/registros', [RegistroController::class, 'index'])->name('registros');
Route::resource('registro', RegistroController::class);
Route::resource('funcionario', FuncionarioController::class);
