<?php
declare(strict_types = 1);

namespace App\Services\Telegram\Exceptions;

use Exception;

class TelegramBotLoggerException extends Exception
{
    public function report()
    {
        logger()
            ->channel('my-super-logger')
            ->error('have error in telegram logger');
    }
}
