<?php

declare(strict_types=1);

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FileDataArrayParser\Contracts\ParseInterface;

class JsonParser extends BaseParser implements ParseInterface
{
    /**
     * @return array
     */
    public function parse(): array
    {
        $content = file_get_contents($this->filePath);

        return $content
            ? ['data' => json_decode($content, true) ?? 'Not valid JSON', 'fileInfo' => $this->fileInfoReader->read()]
            : ['data' => [], 'fileInfo' => 'No such file'];
    }
}