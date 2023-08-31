<?php

namespace VladislavPanda\FileDataArrayParser\Parsers;

use VladislavPanda\FileDataArrayParser\Contracts\ParseInterface;

class TxtParser extends BaseParser implements ParseInterface
{
    /**
     * @var string
     */
    private string $delimiter;

    /**
     * @var string|false
     */
    private string|false $content;

    public function __construct(string $filePath, string $extension = '', string $delimiter = '')
    {
        parent::__construct($filePath, $extension);
        $this->delimiter = $delimiter;
        $this->content = file_get_contents($filePath);
    }

    /**
     * @return array
     */
    public function parse(): array
    {
        $content = $this->getContent();

        return $content
            ? ['data' => $content, 'fileInfo' => $this->fileInfoReader->read()]
            : ['data' => [], 'fileInfo' => 'No such file'];
    }

    /**
     * @return array|false
     */
    private function getContent(): array|false
    {
        if ($this->content) {
            $content = $this->delimiter
                ? array_map(
                    fn (string $field) => trim(str_replace(["\r", "\n"], '', $field)
                ), explode($this->delimiter, $this->content))
                : array_map('trim', file($this->filePath)
            );
        } else {
            $content = false;
        }

        return $content;
    }
}