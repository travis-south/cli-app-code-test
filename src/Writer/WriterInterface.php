<?php

declare(strict_types=1);

namespace App\Writer;

interface WriterInterface
{
    public function write(iterable $data, string $path): void;
}
