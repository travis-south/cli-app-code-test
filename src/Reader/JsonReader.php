<?php

declare(strict_types=1);

namespace App\Reader;

class JsonReader implements ReaderInterface
{
    public function read(string $path): iterable
    {
        try {
            $file = file_get_contents($path);
            if (!$jsonData = json_decode(utf8_encode($file))) {
                throw new \InvalidArgumentException("$path is invalid");
            }
            return $jsonData;
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
