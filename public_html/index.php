<?php

/** @noinspection PhpIncludeInspection */

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Yiisoft\Composer\Config\Builder;
use Yiisoft\Di\Container;
use Yiisoft\Http\Method;
use Yiisoft\Yii\Event\EventConfigurator;
use Yiisoft\Yii\Web\Application;
use Yiisoft\Yii\Web\ServerRequestFactory;
use Yiisoft\Yii\Web\SapiEmitter;

$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (!is_file($autoload)) {
    die('You need to set up the project dependencies using Composer');
}
require_once $autoload;

/** @todo Удалить для продакшена */
Builder::rebuild();

$startTime = microtime(true);

$container = new Container(
    require Builder::path('app-main'),
    require Builder::path('providers-app-main')
);

/** @var ContainerInterface $container */
$container = $container->get(ContainerInterface::class);

$eventConfigurator = $container->get(EventConfigurator::class);
$eventConfigurator->registerListeners(require Builder::path('events-app-main', dirname(__DIR__)));

/** @var Application $application */
$application = $container->get(Application::class);

$request = $container->get(ServerRequestFactory::class)->createFromGlobals();
$request = $request->withAttribute('applicationStartTime', $startTime);

try {
    $application->start();
    $response = $application->handle($request);
    $emitter = new SapiEmitter();
    $emitter->emit($response, $request->getMethod() === Method::HEAD);
} finally {
    $application->afterEmit($response ?? null);
    $application->shutdown();
}