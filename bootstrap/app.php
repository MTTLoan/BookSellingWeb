<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfNotAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function () {
        // Thêm middleware vào trong cấu hình
        return [
            \App\Http\Middleware\RedirectIfNotAuthenticated::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();