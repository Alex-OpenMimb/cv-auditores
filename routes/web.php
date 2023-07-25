<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClintController as UnClientControler;
use App\Http\Livewire\ClientController;
use App\Http\Livewire\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('webSite.home');
});

Route::view('/home', 'webSite.home')->name('home');

Route::get('servicio/{slug}',       [ServiceController::class, 'index'])->name('service.home');
Route::post('contact/save',         [ServiceController::class, 'save'])->name('service.contact');
Route::get('blog/{slug?}',          [BlogController::class, 'index'])->name('webSite.blog');
Route::post('blog/comment/{id}',    [BlogController::class, 'saveComment'])->name('blog.saveComment');
Route::post('landing/save',         [LandingPageController::class, 'save'])->name('landing.save');
Route::get('/darse-de-baja',        [UnClientControler::class, 'index'])->name('webSite.unsubscription');
Route::delete('/darse-de-baja',     [UnClientControler::class, 'handleDelete'])->name('webSite.unsubscription');




Route::view('/contacto', 'webSite.contact')->name('webSite.contact');

Route::view('/formacion', 'webSite.service.study')->name('webSite.service.study');

Route::view('/sobre-nosotros', 'webSite.about')->name('webSite.about');

Route::view('/formación', 'webSite.landing')->name('webSite.landing');

Route::view('/usurio-no-registrado', 'webSite.nofaind')->name('webSite.nofaind');

Route::view('/delete_user', 'webSite.deleteUser')->name('webSite.deleteUser');





Auth::routes();


//protección de las rutas para que solo los usuarios autenticados tengan acceso

Route::middleware(['auth','role'])->group( function() {
	Route::view('dashboard',        'layouts.dashboard');
	Route::view('user',             'user')->name('user');
	Route::view('servicios',        'service')->name('service');
	Route::view('job/team',         'jobTeam')->name('jobTeam');
	Route::view('service/client',   'ServiceHasClient')->name('ServiceHasClient');
	
    Route::get('client',       ClientController::class)->name('client');
		
});


Route::middleware(['auth'])->group( function() {
    Route::get('post',         PostController::class)->name('post');
});
