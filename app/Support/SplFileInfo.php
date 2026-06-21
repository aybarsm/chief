<?php

namespace App\Support;
use SplFileInfo as BaseSplFileInfo;

class SplFileInfo extends BaseSplFileInfo
{
    public function __construct(
        string $filename,
        public readonly ?bool $isDirectory = null,
        public readonly ?int $mode = null,
    )
    {
        parent::__construct($filename);
    }
    public function exists(): bool
    {
        return $this->getRealPath() !== false;
    }

    public function getMode(): int|false
    {
        $perms = $this->getPerms();
        return is_int($perms) ? $perms & 0777 : false;
    }

    public function chmod(?int $mode = null): bool
    {
        $mode = $mode ?? $this->mode;
        throw_if(
            $mode === null,
            'Mode must be provided to chmod.'
        );

        return @chmod($this->getPathname(), $mode);
    }
    public function getFilenameWithoutExtension(): string
    {
        return pathinfo($this->getFilename(), \PATHINFO_FILENAME);
    }
    public function ensureExists(
        ?int $mode = null,
        bool $force = false,
        ?bool $isDirectory = null,
        bool $perms = false,
    ): bool
    {
        $mode = $mode ?? $this->mode;
        if ($this->exists()) {
            if (! $perms) return true;
            throw_if(
                $mode === null,
                'Mode must be provided to ensure permissions.'
            );
            $modeCurrent = $this->getMode();
            if ($modeCurrent === $mode) return true;
            return $this->chmod($mode);
        }

        $isDirectory = is_null($isDirectory) ? $this->isDirectory : $isDirectory;
        throw_if(
            $mode === null,
            'Is directory must be provided to ensure path exists.'
        );

        $mode = $mode ?? 0755;
        $dir = $isDirectory ? $this->getPathname() : dirname($this->getPathname());

        if ($force) {
            $dirRet = @mkdir($dir, $mode, true);
        }else {
            $dirRet = mkdir($dir, $mode, true);
        }

        if ($isDirectory || $dirRet === false) return $dirRet;
        $touchRet = $force ? @touch($this->getPathname()) : touch($this->getPathname());

        return $touchRet === true && $this->chmod($mode);
    }
}
