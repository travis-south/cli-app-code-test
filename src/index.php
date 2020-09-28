<?php

namespace App;

use GetOpt\GetOpt;
use GetOpt\Option;
use App\Command\ConvertCommand;

require_once __DIR__ . '/../vendor/autoload.php';

define('NAME', 'CLI-APP');
define('VERSION', '0.1.0-alpha');

$getOpt = new GetOpt();
// define common options
$getOpt->addOptions([
   
    Option::create('v', 'version', GetOpt::NO_ARGUMENT)
        ->setDescription('Show version information and quit'),
        
    Option::create('?', 'help', GetOpt::NO_ARGUMENT)
        ->setDescription('Show this help and quit'),
    
]);

$getOpt->addCommand(new ConvertCommand());
try {
    try {
        $getOpt->process();
    } catch (Missing $exception) {
        // catch missing exceptions if help is requested
        if (!$getOpt->getOption('help')) {
            throw $exception;
        }
    }
} catch (\Exception $exception) {
    file_put_contents('php://stderr', $exception->getMessage() . PHP_EOL);
    exit;
}

// show version and quit
if ($getOpt->getOption('version')) {
    echo sprintf('%s: %s' . PHP_EOL, NAME, VERSION);
    exit;
}

// show help and quit
$command = $getOpt->getCommand();
if (!$command || $getOpt->getOption('help')) {
    echo $getOpt->getHelpText();
    exit;
}

try {
    call_user_func($command->getHandler(), $getOpt);
} catch (\Exception $exception) {
    file_put_contents('php://stderr', $exception->getMessage() . PHP_EOL);
    echo $getOpt->getHelpText();
    exit;
}
