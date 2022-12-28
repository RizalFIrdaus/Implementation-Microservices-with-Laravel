<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


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
    $response = Http::accept('application/json')->post(
        'http://127.0.0.1:8000/api/register',
        [
            "username" => "rizal300500",
            "email" => "rizal300500@gmail.com",
            "password" => "Rizal_300500"
        ]
    );
    return $response->json();
});
Route::get('login', function () {
    $response = Http::accept('application/json')->post(
        'http://127.0.0.1:8000/api/login',
        [
            "username" => "rizal300500",
            "password" => "Rizal_300500"
        ]
    );
    Cookie::queue('api', $response->json()['data'], 120);
    return redirect('/articles');
});


Route::get('articles', function (Request $request) {
    $response = Http::withToken($request->cookie('api'))->get('http://127.0.0.1:8000/api/article');
    if ($response->ok() == true) {
        $res = $response->json()['data'];
        return view('register', compact('res'));
    } else {
        return redirect()->route('login');
    }
});
Route::get('logout', function (Request $request) {
    $response = Http::withToken($request->cookie('api'))->accept('application/json')->post(
        'http://127.0.0.1:8000/api/logout',
    );
    return redirect('/unathorized');
});
Route::get('/unauthorized', function () {
    return abort(403);
})->name('login');


Route::post('post/article', function (Request $request) {
    $response = Http::withToken($request->cookie('api'))->accept('application/json')->post(
        'http://127.0.0.1:8000/api/article',
        [
            "author" => $request->author,
            "image" => $request->image,
            "title" => $request->title,
            "content" => $request->content
        ]
    );
    return $response->json();
})->name('store');
Route::put('update/article/{id}', function (Request $request, $id) {
    $response = Http::withToken($request->cookie('api'))->accept('application/json')->put(
        'http://127.0.0.1:8000/api/article/' . $id,
        [
            "author" => $request->author,
            "image" => $request->image,
            "title" => $request->title,
            "content" => $request->content
        ]
    );
    return $response->json();
});
Route::get('delete/article/{id}', function (Request $request, $id) {
    $response = Http::withToken($request->cookie('api'))->accept('application/json')->delete(
        'http://127.0.0.1:8000/api/article/' . $id,
    );
    return $response->json();
});
Route::get('create/article', function () {
    return view('create');
});
Route::get('update/article/{id}', function (Request $request, $id) {
    $response = Http::withToken($request->cookie('api'))->accept('application/json')->get(
        'http://127.0.0.1:8000/api/article/' . $id
    );
    $res = $response->json();
    if ($response->status() == 200) {
        return view('update', compact('res'));
    } else {
        return response()->json([
            'message' => 'Unauthorized'
        ]);
    }
});
