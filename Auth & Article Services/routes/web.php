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

Route::get('register', function () {
    // $response = Http::post('http://127.0.0.1:8001/api/register', [
    //     'username' => 'rizal300500',
    //     'email' => 'rizal300500@gmail.com',
    //     'password' => 'rizal300500'
    // ]);
    // if ($response->ok() == 0) {
    //     return abort($response->status());
    // }
    return view('register', compact('response'));
});
