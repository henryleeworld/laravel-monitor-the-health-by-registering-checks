<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

class HealthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Health::checks([
            CacheCheck::new(),
            DatabaseCheck::new(),
            PingCheck::new()->name('Books Test Network Connection')->url('https://www.books.com.tw'),
            PingCheck::new()->name('Pchome Twenty Four Hours Test Network Connection')->url('https://24h.pchome.com.tw'),
            // UsedDiskSpaceCheck::new()->warnWhenUsedSpaceIsAbovePercentage(60)->failWhenUsedSpaceIsAbovePercentage(80),
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
