<?php

namespace App\Http\Livewire;

use App\Clients\ApiClientInterface;
use App\Domains\Model\ChatMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Chat extends Component
{
    public array $chatMessages = [];

    protected $listeners = ['submit'];

    private ApiClientInterface $client;

    public function boot()
    {
        $this->client = App::make(ApiClientInterface::class);
    }

    public function submit(string|null $message): void
    {
        if (empty($message)) return;

        $userCurrentMessage = new ChatMessage(role: 'user', message: $message);

        $this->chatMessages[] = $userCurrentMessage;
        $response = $this->client->postMessage($this->chatMessages);
        $this->chatMessages[] = $response;

        // 2回目以降のリクエスト時に勝手にarrayに変換される．ので，再変換（expected behaviorらしいが...ちょっと謎）
        foreach ($this->chatMessages as $index => $chatMessage) {
            if (is_array($chatMessage)) {
                $this->chatMessages[$index] =
                    $this->reConvert($this->reConvert((object) $chatMessage));
            }
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.chat');
    }

    private function reConvert($value): ChatMessage
    {
        return new ChatMessage($value->role, $value->message);
    }
}
