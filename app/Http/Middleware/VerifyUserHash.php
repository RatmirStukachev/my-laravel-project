<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserHash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->method() === 'POST' || $request->method() === 'PUT' || $request->method() === 'DELETE') {
            Log::debug('--- AJAX/Form Request ---');
            Log::debug('Path: ' . $request->path());
            Log::debug('Session ID: ' . $request->session()->getId());
            Log::debug('Token from session: ' . $request->session()->token());
            Log::debug('Token from header (X-CSRF-TOKEN): ' . $request->header('X-CSRF-TOKEN'));
            Log::debug('Session data: ', $request->session()->all());
        }

        if(!$request->session()->has('user_hash')){
            $request->session()->put('user_hash', Hash::make( Str::random(32)));
        }
        
        return $next($request);
    }
}
