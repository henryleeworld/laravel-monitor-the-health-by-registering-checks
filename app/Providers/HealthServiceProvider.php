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
     *
     * @return void
     */
    public function register()
    {
        Health::checks([
            CacheCheck::new(),
            DatabaseCheck::new(),
            PingCheck::new()->name('PChome24h購物測試網路連線')->url('https://24h.pchome.com.tw'),
            // UsedDiskSpaceCheck::new()->warnWhenUsedSpaceIsAbovePercentage(60)->failWhenUsedSpaceIsAbovePercentage(80),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
