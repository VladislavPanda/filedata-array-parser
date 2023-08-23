<?php

declare(strict_types=1);

namespace VladislavPanda\FileDataArrayParser;

use VladislavPanda\FiledataArrayParser\Contracts\ParseInterface;

class FileParserFactory
{
    private const NAMESPACE = __NAMESPACE__ . '\\Parsers\\';

    /**
     * @param string $filePath
     * @return ParseInterface
     */
    public static function init(string $filePath): ParseInterface
    {
        $extension = pathinfo($filePath , PATHINFO_EXTENSION);
        $parser = FileParserFactory::NAMESPACE . ucfirst($extension) . 'Parser';

        if (! class_exists($parser)) {
            $parser = FileParserFactory::NAMESPACE . 'UnhandledResourceParser';
        }

        return new $parser(filePath: $filePath, extension: $extension);
    }
}