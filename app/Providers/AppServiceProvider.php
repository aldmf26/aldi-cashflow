<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Membuat Blade directive @ifSubscribed
        Blade::directive('langganan', function ($expression) {
            return "<?php if (Auth::check() && Auth::user()->subscription_status == 'premium' && Auth::user()->subscription_end >= now()): ?>";
        });

        // Membuat directive penutup @endifSubscribed
        Blade::directive('endlangganan', function ($expression) {
            return "<?php endif; ?>";
        });
    }
}
