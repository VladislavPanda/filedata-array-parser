<?php

declare(strict_types=1);

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FileDataArrayParser\FileInfoReader;

class BaseParser
{
    /**
     * @var array|string[]
     */
    protected static array $supportedExtensions = [
        '.json',
        '.txt',
        '.csv'
    ];

    /**
     * @var string
     */
    protected string $extension;

    /**
     * @var FileInfoReader
     */
    protected FileInfoReader $fileInfoReader;

    //protected ?string $content = null;

    public function __construct(
        protected string $filePath,
        string $extension
    ) {
        $this->extension = $extension ?? '';
        $this->fileInfoReader = new FileInfoReader($filePath, $extension);
    }
}