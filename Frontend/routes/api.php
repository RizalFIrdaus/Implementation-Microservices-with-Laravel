<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('post', function () {
    $response = Http::get('http://127.0.0.1:8000/api/article');
    return $response;
});
// Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::get('post', function () {
    $response = Http::withToken('6|tmKe0BzF6pveyOy8xkjpRyw4RaJroUVQUEPHN6mT')->get('http://127.0.0.1:8000/api/article/1');
    if ($response->ok() == 0) {
        return abort($response->status());
    }
    return $response->json();
});
