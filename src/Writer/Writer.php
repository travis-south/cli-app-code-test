<?php

declare(strict_types=1);

namespace App\Writer;

class Writer
{

    private $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function write(iterable $data, string $path): void
    {
        $this->writer->write($data, $path);
    }
}
