<div>
  <div class="card mt-3 pt-2 p-3">
    <div class="container-fluid">
      <div class="row">
        <livewire:submitter></livewire:submitter>
      </div>
      <div class="row">
        <div class="card w-100">
          @foreach ($chatMessages as $key => $message)
            <livewire:time-line :chat-message="$message" key="{{$key}}"></livewire:time-line>
          @endforeach
        </div>
      </div>
      <div class="row pt-2">
        <div class="col">
          <div wire:loading.flex class="justify-content-center">
            <div class="spinner-border" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
