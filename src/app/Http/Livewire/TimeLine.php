<?php

namespace App\Http\Livewire;

use App\Domains\Model\ChatMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TimeLine extends Component
{
    public ChatMessage $chatMessage;

    public function render(): Factory|View|Application
    {
        return view('livewire.time-line');
    }
}
