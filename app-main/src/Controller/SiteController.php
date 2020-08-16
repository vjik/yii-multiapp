<?php

declare(strict_types=1);

namespace AppMain\Controller;

use AppMain\ViewRenderer;
use Psr\Http\Message\ResponseInterface;

class SiteController
{

    private ViewRenderer $viewRenderer;

    public function __construct(ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer->withController($this);
    }

    public function index(): ResponseInterface
    {
        return $this->viewRenderer->render('index');
    }
}
