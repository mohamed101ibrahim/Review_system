<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('login',LoginController::class)
->middleware('throttle:5,1')
->name('login.attempt');

Route::view('dashboard','dashboard')->middleware('auth')->name('dashboard');

Route::post('logout' , function () {
  Auth::guard('web')->logout();
  Session::invalidate();
  Session::regenerateToken();
  return redirect('/');
})->name('logout');

Route::view('register','register')->name('register');
Route::post('register',RegisterController::class)->name('register.store');



Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
Route::get('company/show', [CompanyController::class, 'show'])->name('company.show');
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');

Route::post('company', [CompanyController::class, 'store'])->name('company.store');