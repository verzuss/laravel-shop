<?php
declare(strict_types = 1);

namespace App\Services\Telegram;

use App\Services\Telegram\Exceptions\TelegramBotLoggerException;
use Illuminate\Support\Facades\Http;

class TelegramApiBot
{
    private const API = 'api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        try {
            $response = Http::get(
                self::API . $token . '/sendMessage',
                [
                    'chat_id' => $chatId,
                    'text' => $text,
                ]
            )->throw()->json();

            return $response['ok'] || false;
        } catch (\Throwable $th) {
            report(new TelegramBotLoggerException($th->getMessage()));

            return false;
        }
    }
}
