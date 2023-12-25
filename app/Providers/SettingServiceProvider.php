<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $value = Cache::rememberForever('settings', function () {

            $result = Setting::all()->mapWithKeys(function ($setting) {
                    return [$setting->key => ['value' => $setting->value, 'group' => $setting->group]];
            })->toArray();

            return $result;
        });

        config()->set('settings', $value);
    }
}
