<?php

declare(strict_types=1);

namespace AppAdmin;

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

    public function charset(string $value): self
    {
        $new = clone $this;
        $new->charset = $value;
        return $new;
    }

    public function language(string $value): self
    {
        $new = clone $this;
        $new->language = $value;
        return $new;
    }
}
