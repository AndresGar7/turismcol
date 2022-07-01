<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');

// Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/galeria', [App\Http\Controllers\GaleriaController::class, 'index'])->name('galeria.index');


// RUTAS CREADAS PARA MOSTRAR LAS NOTICIAS EN LA PAGINA WEB PRINCIPAL
// Route::get('/noticias', [App\Http\Controllers\NoticiaController::class, 'index'])->name('noticias.index')->middleware('is_authorized:cli');
Route::get('/noticias', [App\Http\Controllers\NoticiaController::class, 'index'])->name('noticias.index');

// RUTAS CREADAS PARA LA ADMINISTRACION DE LAS NOTICIAS
Route::get('/noticias/admin', [App\Http\Controllers\NoticiaController::class, 'admin'])->name('noticias.admin');
Route::get('/noticias/crear', [App\Http\Controllers\NoticiaController::class, 'create'])->name('noticias.create');
Route::get('/noticias/{noticia}/editar', [App\Http\Controllers\NoticiaController::class, 'edit'])->name('noticias.edit');
Route::get('/noticias/admin/{noticia}', [App\Http\Controllers\NoticiaController::class, 'showAdmin'])->name('noticias.showAdmin');
Route::get('/noticias/{noticia}', [App\Http\Controllers\NoticiaController::class, 'show'])->name('noticias.show');
Route::patch('/noticias/{noticia}', [App\Http\Controllers\NoticiaController::class, 'update'])->name('noticias.update');
Route::post('/noticias', [App\Http\Controllers\NoticiaController::class, 'store'])->name('noticias.store');
Route::delete('noticias/{noticia}', [App\Http\Controllers\NoticiaController::class, 'destroy'])->name('noticias.destroy');

// RUTAS CREADA PARA MOSTRAR EL INDEX DEL PRESUPUESTO
Route::get('/presupuesto',[App\Http\Controllers\PresupuestoController::class, 'index'])->name('presupuesto.index');
Route::post('/presupuesto', [App\Http\Controllers\PresupuestoController::class, 'store']);

// RUTAS CREADA PARA MOSTRAR EL CONTACTO
Route::get('/contacto',[App\Http\Controllers\ContactoController::class, 'index'])->name('contacto.index');

// RUTAS CREADAS PARA LA ADMINISTRACION DEL PERFIL REGISTRADO
Route::get('/perfil/admin', [App\Http\Controllers\PerfilController::class, 'admin'])->name('perfil.admin');
Route::post('/perfil', [\App\Http\Controllers\PerfilController::class, 'store'])->name('perfil.store');
Route::patch('/perfil/{usuario}', [App\Http\Controllers\PerfilController    ::class, 'update'])->name('perfil.update');
// RUTAS PARA LA ACTUALIZACION DE LA CONTRASEÑA DEL USUARIO
Route::get('/perfil/CambioContraseña', [\App\Http\Controllers\PerfilController::class, 'changePassword'])->name('perfil.changePassword');
Route::patch('/perfil/CambioContraseña/{usuario}', [\App\Http\Controllers\PerfilController::class, 'updatePassword'])->name('perfil.updatePassword');