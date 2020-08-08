<?php

declare(strict_types=1);

namespace AppMain;

final class ApplicationParameters
{
    private string $charset = 'UTF-8';
    private string $language = 'en';

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
