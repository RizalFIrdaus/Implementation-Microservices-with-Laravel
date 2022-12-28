<?php

use App\Http\Controllers\ArticleController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('test', function () {
        $response =  Http::withToken('6|tmKe0BzF6pveyOy8xkjpRyw4RaJroUVQUEPHN6mT')->get('http://127.0.0.1:8000/api/getToken');
        return $response;
    });
    Route::get('getToken', function (Request $request) {
        return $request->bearerToken();
    });
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::get('user/getEmail', function (Request $request) {
        return $request->user()->email;
    });
    Route::get('user/getUsername', function (Request $request) {
        return $request->user()->username;
    });
    Route::apiResource('article', ArticleController::class)->parameters([
        'article' => 'id'
    ]);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('/unauthorized', function () {
    return abort(403);
})->name('login');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
