<?php

declare(strict_types=1);

namespace AppMain\Controller;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\DataResponse\DataResponseFactoryInterface;

class SiteController
{

    public function index(DataResponseFactoryInterface $responseFactory): ResponseInterface
    {
        return $responseFactory->createResponse('Hello World!');
    }
}
