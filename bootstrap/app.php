<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',                                         //using web middleware group 
        then: function () {// (prefix )related to the uri and the (name )related to the names of the routes
            Route::namespace('Admin')->prefix('')->name('')->middleware('web')->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => EnsureUserHasRole::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
