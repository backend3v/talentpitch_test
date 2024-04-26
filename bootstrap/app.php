<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RequestMiddleware;
use Illuminate\Support\Facades\Log;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(EnsureTokenIsValid::class);
        $middleware->group('web', [
            \App\Http\Middleware\RequestMiddleware::class,
            // \Illuminate\Cookie\Middleware\EncryptCookies::class,
            // \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // // \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            // \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // // \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);
        $middleware->use([
            // \Illuminate\Http\Middleware\TrustHosts::class,
            App\Http\Middleware\RequestMiddleware::class,
            // \Illuminate\Http\Middleware\TrustProxies::class,
            // \Illuminate\Http\Middleware\HandleCors::class,
            // \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
            // \Illuminate\Http\Middleware\ValidatePostSize::class,
            // \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
            // \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $e) {
        // $message = "\n\t| Code :  ".$e->getCode()."\n\t| File :  ".$e->getFile()."\n\t| Line :  ".$e->getLine();
        //     Log::channel('stderr')->error($message);
        
        $e->report(function (Exception $e) {
            // ...
            Log::channel('stderr')->error("______________________ERROR DESCRIPTION________2______________");
            $message = $e->getMessage();
            Log::channel('stderr')->error("MESSAGE :: ".$message);
            $message = "\n\t| Type :  ".get_class($e)."\n\t|\n\t| Code :  ".$e->getCode()."\n\t| File :  ".$e->getFile()."\n\t| Line :  ".$e->getLine();
            Log::channel('stderr')->error($message);
            Log::channel('stderr')->error("_________________________ERROR TRACE_________________________");
            Log::channel('stderr')->error($e->getTraceAsString());
            Log::channel('stderr')->error("_____________________________________________________________");
            $class_e = get_class($e);
            $code = 500;
            Log::channel('stderr')->error($class_e);
            switch ($class_e) {
                case 'Illuminate\Database\QueryException':
                    $code =  400;
                case 'Illuminate\Database\UniqueConstraintViolationException':
                    $code =  400;
            };
            abort($code);;
        });
        })->create();
