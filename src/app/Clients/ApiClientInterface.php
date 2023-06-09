<?php

namespace App\Clients;

use App\Domains\Model\ChatMessage;

interface ApiClientInterface
{
    public function postMessage(array $messages): ChatMessage;
}
