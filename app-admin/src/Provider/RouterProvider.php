<?php

declare(strict_types=1);

namespace AppAdmin\Provider;

use Psr\Container\ContainerInterface;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Di\Container;
use Yiisoft\Di\Support\ServiceProvider;
use Yiisoft\Router\FastRoute\UrlGenerator;
use Yiisoft\Router\FastRoute\UrlMatcher;
use Yiisoft\Router\Group;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;

final class RouterProvider extends ServiceProvider
{

    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function register(Container $container): void
    {
        $container->set(RouteCollectorInterface::class, Group::create());

        $container->set(UrlMatcherInterface::class, function (ContainerInterface $container) {
            $collector = $container->get(RouteCollectorInterface::class);
            $collector->addGroup(
                Group::create('/admin', $this->routes)
                    ->addMiddleware(FormatDataResponse::class)
            );
            return new UrlMatcher(new RouteCollection($collector));
        });

        $container->set(UrlGeneratorInterface::class, UrlGenerator::class);
    }
}
