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
    $middleware = new \Illuminate\Foundation\Configuration\Middleware();
    return $middleware->getMiddlewareGroups()[$group];
}