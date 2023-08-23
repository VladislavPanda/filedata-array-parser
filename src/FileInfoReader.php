<?php

declare(strict_types=1);

namespace VladislavPanda\FileDataArrayParser;

class FileInfoReader
{
    public function __construct(
        private string $filePath,
        private string $extension
    ) {
    }

    /**
     * @return array
     */
    public function read(): array
    {
        return [
            'filename' => pathinfo($this->filePath)['filename'],
            'extension' => $this->extension,
            'directory' => pathinfo($this->filePath)['dirname'],
            'fileType' => filetype($this->filePath),
            'mimeType' => mime_content_type($this->filePath),
            'filesize' => filesize($this->filePath),
            'dateTimeOfCreation' => date('Y-m-d H:i:s', filectime($this->filePath)),
            'dateTimeOfLastModify' => date('Y-m-d H:i:s', stat($this->filePath)[9]),
            'permissions' => substr(sprintf('%o', fileperms($this->filePath)), -4),
        ];
    }
}