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
