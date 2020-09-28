<?php

declare(strict_types=1);

namespace App\Writer;

use Symfony\Component\Yaml\Exception\DumpException;
use Symfony\Component\Yaml\Yaml;

class YamlWriter implements WriterInterface
{
    public function write(iterable $data, string $path): void
    {
        try {
            $yaml = Yaml::dump($data);
            if ((file_put_contents($path, $yaml)) === false) {
                throw new \InvalidArgumentException("$path is invalid");
            }
        } catch (DumpException $e) {
            throw new \InvalidArgumentException("$path is invalid");
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
