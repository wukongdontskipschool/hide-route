# Laravel-Hide-Route
Laravel 本地开发额外路由

## 安装
    composer require wukongdontskipschool/hide-route --dev

## 使用
- .env 添加<br>
  APP_ENV=local
- php artisan createHideRoute<br/>
  生成路由文件 storage/app/public/HideRoute.php

## 测试
    访问 http://xx.com/hide-route/test