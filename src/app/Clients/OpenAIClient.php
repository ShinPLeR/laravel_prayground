<?php

namespace App\Clients;

use OpenAI\Client;

class OpenAIClient
{
    private static $instance = null;
    private static $client = null;
    private static $API_KEY = '';

    private function __construct() {}

    public static function instantiate(): self
    {
        self::$API_KEY = config('config.API_KEY');
        if (empty(self::$API_KEY)) {
            throw new \ValueError("API KEY isn't provided");
        }

        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        if (is_null(self::$client)) {
            self::$client = \OpenAI::client(self::$API_KEY);
        }

        return self::$instance;
    }

    public function postMessage(array $messages): array
    {
        $response = self::$client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages
        ]);
        foreach ($response->choices as $choice) {
            \Log::info($choice->message->content);
        }

        return ['role' => $response->choices[0]->message->role, 'content' => $response->choices[0]->message->content];
    }
}
