<?php

use App\Http\Controllers\empleadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Llamamos el metodo index del controlador empleados
Route::get('/empleados_activos', [empleadosController::class, 'index']);
Route::get('/formulario', [empleadosController::class, 'getformulario'])->name('formularioRegistro');
Route::post('/registrarEmp', [empleadosController::class, 'store'])->name('guardar.empleados');
Route::put('/actualizarEmp/{id}', [empleadosController::class, 'update'])->name('actualizar.empleado');
Route::put('/desactivarEmp/{id}', [empleadosController::class, 'destroy'])->name('desactivar.empleado');
Route::get('/inicioSesion', [LoginController::class, 'iniciarSesion'])->name('inicio.sesion');
Route::get('/cerrarSesion', [LoginController::class, 'cerrarSesion'])->name('cerrar.sesion');
Route::get('/prueba', [PDFController::class, 'obetnerEmpleadosById']);
Route::get('/reporte_empleados', [PDFController::class, 'obtenerEmpleadosByJefe']);
Route::get('/filtrado_departamentos', [PDFController::class, 'getDepartamentoRepo']);
Route::get('/reporte_filtrado', [PDFController::class, 'reporteEmpleadosByDepartamento'])->name('reporte.filtrado');