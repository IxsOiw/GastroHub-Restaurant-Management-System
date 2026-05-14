<?php

namespace Ixsaiw\Bistro;

class Helpers
{
    public static function isPostRequest(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function sanitize(string $value): string
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    public static function redirect(string $path): void
    {
        header("Location: {$path}");
        exit;
    }
}
