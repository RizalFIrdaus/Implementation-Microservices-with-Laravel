<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data, $message, $statuscode) {
            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $data
            ], $statuscode);
        });
        Response::macro('error', function ($message, $statuscode) {
            return response()->json([
                'status' => false,
                'message' => $message
            ], $statuscode);
        });
    }
}
