<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\RolesComponent;
use App\Http\Livewire\TicketsComp;
use App\Http\Livewire\TicketEdit;
use App\Http\Livewire\UsersComponent;
use App\Http\Livewire\CatalogosComp;
use App\Http\Livewire\Edificios;

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


Route::view('/', 'login')->name('login');
Route::post('/loginned', [UserController::class, 'authenticate'])->name('loginned');


//Auth
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('welcome');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user/add', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/save', [UserController::class, 'store'])->name('users.store');

    //Tickets
    Route::get('/tickets', TicketsComp::class)->name('tickets');
    Route::get('/tickets/editar/{ticket}', TicketEdit::class)->name('tickets.editar');
    Route::get('/ticket/document/{id}', [PDFController::class, 'viewDocTicket'])->name('ticketDocument');

    //Catalogos
    Route::group(['middleware' => ['permission:Catalogos']], function () {
        Route::get('/admin/catalogos', CatalogosComp::class)->name('catalogos');
    });

    //Users
    Route::group(['middleware' => ['permission:Seccion usuarios']], function () {
        Route::get('/usuarios', UsersComponent::class)->name('usuarios');
        Route::get('/user/roles/{id}', RolesComponent::class)->name('roles');
    });
});
