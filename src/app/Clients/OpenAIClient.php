<?php

namespace App\Clients;

use App\Domains\Model\ChatMessage;
use OpenAI\Client;

class OpenAIClient implements ApiClientInterface
{
    private static Client $client;
    private static string $API_KEY = '';

    public function __construct() {
        self::$API_KEY = config('config.API_KEY');
        if (empty(self::$API_KEY)) {
            throw new \ValueError("API KEY isn't provided");
        }

        self::$client = \OpenAI::client(self::$API_KEY);
    }

    public function postMessage(array $messages): ChatMessage
    {
        $response = self::$client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => array_map(function ($message) {
                return [
                    'role' => $message->role,
                    'content' => $message->message,
                ];
            }, $messages),
        ]);

        return new ChatMessage(
            $response->choices[0]->message->role,
            $response->choices[0]->message->content
        );
    }
}
