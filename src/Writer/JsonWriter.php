<?php

declare(strict_types=1);

namespace App\Writer;

class JsonWriter implements WriterInterface
{
    public function write(iterable $data, string $path): void
    {
        try {
            if (($file = @fopen($path, 'w')) === false) {
                throw new \InvalidArgumentException("$path is invalid");
            }
            if (($json = json_encode($data)) === false) {
                throw new \InvalidArgumentException("$path is invalid");
            }
            fputs($file, $json);
            fclose($file);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
