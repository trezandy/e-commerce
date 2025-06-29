<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // Mengecualikan webhook dari verifikasi CSRF.
        $middleware->validateCsrfTokens(except: [
            '/midtrans-webhook',
        ]);

        // --- KONFIGURASI PROXY KONDISIONAL (AMAN UNTUK PRODUKSI) ---

        // Cek apakah aplikasi berjalan di lingkungan 'local' (APP_ENV=local di .env)
        // if (app()->isLocal()) {
        if (env('APP_ENV') === 'local') {
            // Jika ya (saat menggunakan Ngrok), percayai semua proxy.
            $middleware->trustProxies(at: '*');
        } else {
            // JIKA DI LINGKUNGAN PRODUKSI:
            // Biarkan kosong, atau atur secara spesifik jika Anda menggunakan 
            // load balancer seperti Cloudflare atau AWS ELB.
            // Contoh untuk Cloudflare:
            /*
            $middleware->trustProxies(at: [
                '198.41.128.0/17',
                '173.245.48.0/20',
                // ...dan IP range lainnya
            ]);
            */
        }
        // ----------------------------------------------------------------

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
