<?php

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
    return ['Laravel' => app()->version(), 'user_id' => \Illuminate\Support\Facades\Auth::id()];
});

Route::middleware(['auth:sanctum'])->get('/user', function (\Illuminate\Http\Request $request) {
    return $request->user();
});

require __DIR__.'/auth.php';
