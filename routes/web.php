<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Admin\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->prefix(LaravelLocalization::setLocale())->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
// dd(Auth::user()); 

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function(){
                Route::get('/', function () { return view('welcome'); });
                Route::group([
                        'middleware' => ['auth', 'verified']
                ],function(){
                        Route::get('/home', function () { return view('home'); })->name('home');
                        Route::prefix('admin')->middleware(['auth.isAdmin'])->name('admin.')->group(function(){
                                route::resource('users',UserController::class);
                                route::get('profile/{id}',[AdminUserController::class,'profile'])->name('profile');

                        });
                });
        
});
