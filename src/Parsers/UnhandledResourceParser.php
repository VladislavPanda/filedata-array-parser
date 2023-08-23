<?php

declare(strict_types=1);

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FileDataArrayParser\Contracts\ParseInterface;

class UnhandledResourceParser extends BaseParser implements ParseInterface
{
    /**
     * @return array
     */
    public function parse(): array
    {
        return [
            'data' => [],
            'fileInfo' => $this->extension == ''
                ? 'Given string is not valid filepath'
                : 'Unsupported file extension (' . $this->extension . ').'
                    . ' Available extensions: ' . implode(', ', self::$supportedExtensions)
        ];
    }
}