<?php

declare(strict_types=1);

use AppAdmin\Controller\SiteController;
use Yiisoft\Router\Route;

return [
    Route::get('/', [SiteController::class, 'index'])->name('site/index'),
];
