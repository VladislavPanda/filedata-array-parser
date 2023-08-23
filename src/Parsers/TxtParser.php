<?php

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FileDataArrayParser\Contracts\ParseInterface;

class TxtParser extends BaseParser implements ParseInterface
{
    /**
     * @return array
     */
    public function parse(): array
    {
        $content = file($this->filePath);

        return $content
            ? ['data' => array_map('trim', $content), 'fileInfo' => $this->fileInfoReader->read()]
            : ['data' => [], 'fileInfo' => 'No such file'];
    }
}