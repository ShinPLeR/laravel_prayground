<div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="input your question" wire:model.defer="message">
        <button class="input-group-text" wire:click="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <i class="bi bi-send"></i>
            </span>
            <span wire:loading>
                <div class="spinner-border spinner-border-sm" role="status"></div>
            </span>
        </button>
    </div>
    <div class="container-fluid">
        @foreach($messages as $message)
            <div class="row">
                <div class="col-1">
                    <h6>{{ $message['role'] === 'user' ? 'You' : 'AI' }}</h6>
                </div>
                <div class="col">
                    <p>{{ $message['content'] }}</p>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col">
                <div wire:loading>
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    </div>
</div>
