<div>
  <div class="row py-2">
    <div class="col-1 d-flex align-items-center justify-content-center">
      @if ($chatMessage->role === 'user')
        <x-icon.user></x-icon.user>
      @else
        <x-icon.robot></x-icon.robot>
      @endif
    </div>
    <div class="col align-middle">
      <div class="border border-1 p-1 rounded">
        <span>{{ $chatMessage->message }}</span>
      </div>
    </div>
  </div>
</div>
