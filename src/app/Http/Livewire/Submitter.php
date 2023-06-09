<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Submitter extends Component
{
    public string|null $message = '';

    public function mount()
    {
        $this->message = '';
    }

    public function submit()
    {
        if (empty($this->message)) return;
        $this->emitUp('submit', $this->message);
        $this->reset('message');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.submitter');
    }
}
