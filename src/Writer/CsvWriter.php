<?php

declare(strict_types=1);

namespace App\Writer;

class CsvWriter implements WriterInterface
{
    public function write(iterable $data, string $path): void
    {
        try {
            if (($file = @fopen($path, 'w')) === false) {
                throw new \InvalidArgumentException("$path is invalid");
            }
            foreach ($data as $key => $fields) {
                if ($key === 0) {
                    fputcsv($file, array_keys($fields));
                }
                fputcsv($file, $fields);
            }
            fclose($file);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
