<?php

namespace App\Http\Livewire;

use App\Clients\OpenAIClient;
use Livewire\Component;

class Chat extends Component
{
    public string $message = '';

    public array $messages = [];

    private OpenAIClient $client;

    public function __construct($id = null)
    {
        $this->client = OpenAIClient::instantiate();
        parent::__construct($id);
    }

    public function submit()
    {
        $this->messages[] = ['role' => 'user', 'content' => $this->message];
        $res = $this->client->postMessage($this->messages);
        $this->messages[] = $res;
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
