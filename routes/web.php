<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\DashController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\TicketController;
use \App\Http\Controllers\SettingController;

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

Route::controller(AuthController::class)->group(function(){

    Route::get('/', 'index')->name('login');
	
    Route::get('login', 'index')->name('login');
	
    Route::get('signup', 'registration')->name('registration');
	
    Route::get('logout', 'logout')->name('logout');
	
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
	
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
	
});

Route::group(['middleware' => ['CheckLogin']],function(){
	
	Route::get('/dashboard', [DashController::class, 'dashboard'])->name('Dashboard');
	
	Route::get('/users', [UserController::class, 'users'])->name('Users');
	
	Route::get('/users/{id}', [UserController::class, 'users'])->name('Users')->where('id', '[0-9]*');
	
	Route::get('/users/create', [UserController::class, 'create'])->name('Create User');
	
	Route::post('/users/delete', [UserController::class, 'delete'])->name('Delete Users');
	
	Route::post('/users/createuser', [UserController::class, 'CreateUser'])->name('Create Users');
	
	Route::get('/profile', [UserController::class, 'Profile'])->name('User Profile');
	
	Route::post('/profileupdate', [UserController::class, 'UpdateProfile'])->name('Update Profile');
	
	Route::get('/tickets', [TicketController::class, 'Tickets'])->name('Ticket\'s');
	
	Route::get('/tickets/{id}', [TicketController::class, 'Tickets'])->name('Ticket\'s')->where('id', '[0-9]*');
	
	Route::post('/tickets/delete', [TicketController::class, 'delete'])->name('Delete Tickets');
	
	Route::get('/tickets/create', [TicketController::class, 'Create'])->name('Create Tickets Page');
	
	Route::post('/tickets/createticket', [TicketController::class, 'CreateTicket'])->name('Create Tickets');
	
	Route::get('/tickets/open/{id}', [TicketController::class, 'OpenTicket'])->name('Open Ticket')->where('id', '[0-9]*');
	
	Route::post('/tickets/write/{id}', [TicketController::class, 'WriteTicket'])->name('Write Ticket')->where('id', '[0-9]*');
	
	Route::post('/tickets/status/{id}', [TicketController::class, 'TicketStatus'])->name('Close Ticket')->where('id', '[0-9]*');
	
	Route::get('/settings/general', [SettingController::class, 'general'])->name('Setting\'s');
	
	Route::post('/settings/update', [SettingController::class, 'Update'])->name('Setting Update\'s');
	
});
	

