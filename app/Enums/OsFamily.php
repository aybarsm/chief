<?php

namespace App\Enums;
use Illuminate\Support\Arr;
use function Illuminate\Filesystem\join_paths;

enum OsFamily
{
    case WINDOWS;
    case BSD;
    case DARWIN;
    case SOLARIS;
    case LINUX;
    case UNKNOWN;

    public static function make(): static
    {
        return match(strtolower(PHP_OS_FAMILY)){
            'windows' => self::WINDOWS,
            'linux' => self::LINUX,
            'darwin' => self::DARWIN,
            'solaris' => self::SOLARIS,
            default => self::UNKNOWN,
        };
    }

    public function isWindows(): bool
    {
        return $this === self::WINDOWS;
    }

    public function isBsd(): bool
    {
        return $this === self::BSD;
    }

    public function isDarwin(): bool
    {
        return $this === self::DARWIN;
    }

    public function isSolaris(): bool
    {
        return $this === self::SOLARIS;
    }

    public function isLinux(): bool
    {
        return $this === self::LINUX;
    }

    public function isUnknown(): bool
    {
        return $this === self::UNKNOWN;
    }

    public function isUnix(): bool
    {
        return $this->isBsd() || $this->isDarwin() || $this->isSolaris() || $this->isLinux();
    }
}
