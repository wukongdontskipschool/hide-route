<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
        ...getMiddleware('web'),
    ])
    ->prefix('hide-route')
    ->group(function () {
        Route::get('test', function () {
            return '<h1>test</h1>';
        });
    });


/**
 * 获取默认中间件
 * @param string $group web|api
 * @return array
 */
function getMiddleware($group = 'web')
{
    $class = '\Illuminate\Foundation\Configuration\Middleware';
    if (class_exists($class)) {
        /** @var \Illuminate\Foundation\Configuration\Middleware $middleware */
        $middleware = new $class();
        return $middleware->getMiddlewareGroups()[$group];
    }

    $class = '\App\Http\Kernel';
    if (class_exists($class)) {
        /** @var \App\Http\Kernel $kernel */
        $kernel = new $class();
        return $kernel->getMiddlewareGroups()[$group];
    }
    
    return [];
}