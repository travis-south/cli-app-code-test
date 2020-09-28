<?php

declare(strict_types=1);

namespace App\Reader;

class Reader
{

    private $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function read(string $path): iterable
    {
        return $this->reader->read($path);
    }
}
