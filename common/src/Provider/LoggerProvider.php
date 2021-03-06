<?php

namespace Common\Provider;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Yiisoft\Di\Container;
use Yiisoft\Di\Support\ServiceProvider;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileTarget;

final class LoggerProvider extends ServiceProvider
{
    public function register(Container $container): void
    {
        $container->set(
            LoggerInterface::class,
            static fn(ContainerInterface $container) => new Logger([
                'file' => $container->get(FileTarget::class)
            ])
        );
    }
}
