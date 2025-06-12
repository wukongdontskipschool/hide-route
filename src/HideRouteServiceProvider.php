<?php

namespace Wukongdontskipschool\HideRoute;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class HideRouteServiceProvider extends ServiceProvider
{
    const HIDE_ROUTE_PATH = 'HideRoute.php';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        if (!app()->environment('local')) {
            return;
        }

        // 注册command 命令为 php artisan createHideRoute
        Artisan::command('createHideRoute', function () {
            HideRouteServiceProvider::createHideRoute();
        });

        if (Storage::disk('public')->exists(self::HIDE_ROUTE_PATH)) {
            $this->loadRoutesFrom(Storage::disk('public')->path(self::HIDE_ROUTE_PATH));
        }
    }

    /**
     * 生成storage/app/public/HideRoute.php路由文件
     */
    public static function createHideRoute()
    {
        $res = Storage::disk('public')
                ->put(
                    self::HIDE_ROUTE_PATH,
                    file_get_contents(__DIR__ . '/' . self::HIDE_ROUTE_PATH)
                );

        if ($res) {
            echo 'created successfully ' . Storage::disk('public')->path(self::HIDE_ROUTE_PATH) . PHP_EOL;
        } else {
            echo 'failed to create ' . self::HIDE_ROUTE_PATH . PHP_EOL;
        }
    }
}
