<?php

use App\Http\Controllers\Admin\ExpenseController;
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
    return view('welcome');
});


Auth::routes();

Route::redirect('/', '/login');
Route::redirect('/home', '/admin/expenses');
//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::redirect('/', '/admin/expenses');
    Route::redirect('/home', '/admin/expenses');

    //Expenses - Gastos
    Route::resource('expenses', ExpenseController::class);
});
