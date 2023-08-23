<?php

declare(strict_types=1);

namespace VladislavPanda\FiledataArrayParser\Contracts;

interface ParseInterface
{
    /**
     * @return array
     */
    public function parse(): array;
}