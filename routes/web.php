<?php

use App\Http\Controllers\Admin\ExpenseCategoryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\IncomeCategoryController;
use App\Http\Controllers\Admin\IncomeController;
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

    Route::resource('expenses', ExpenseController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenseCategories', ExpenseCategoryController::class);
    Route::resource('incomeCategories', IncomeCategoryController::class);
});
