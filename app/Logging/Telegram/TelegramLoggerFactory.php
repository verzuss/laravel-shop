<?php
declare(strict_types = 1);

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory
{
    public function __invoke(array $config)
    {
       return new Logger(
            'telegram',
            [new TelegramLoggerHandler($config)]
        );
    }
}
