<?php
declare(strict_types = 1);

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramApiBot;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    protected string $token;

    protected int $chatId;

    public function __construct(array $config) {
        $level = Logger::toMonologLevel($config['level']);

        parent::__construct($level);

        $this->token = $config['token'];
        $this->chatId = $config['chat_id'];
    }

    public function write(array $record): void
    {
        TelegramApiBot::sendMessage(
            $this->token,
            $this->chatId,
            $record['formatted'],
        );
    }
}
