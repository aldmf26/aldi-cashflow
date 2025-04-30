<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user->subscription_status == 'premium' && $user->subscription_end >= now()) {
            return $next($request);
        }
        // Jika berlangganan habis, ubah status ke free
        if ($user->subscription_status == 'premium' && $user->subscription_end < now()) {
            $user->subscription_status = 'free';
            $user->subscription_end = null;
            $user->save();
        }
        return redirect()->route('subscribe')->with('error', 'Upgrade ke premium untuk akses fitur ini!');
    }
}
