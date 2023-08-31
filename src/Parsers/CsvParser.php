<?php

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FiledataArrayParser\Contracts\ParseInterface;

class CsvParser extends BaseParser implements ParseInterface
{
    /**
     * @var string|false
     */
    private string|false $content;

    public function __construct(string $filePath, string $extension)
    {
        parent::__construct($filePath, $extension);
    }

    public function parse(): array
    {
        return [];
    }
}