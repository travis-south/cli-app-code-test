<?php

declare(strict_types=1);

namespace App\Reader;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class YamlReader implements ReaderInterface
{
    public function read(string $path): iterable
    {
        try {
            $value = Yaml::parseFile($path);
            return $value;
        } catch (ParseException $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
