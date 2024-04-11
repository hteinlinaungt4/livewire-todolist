{{-- search  --}}
<div class="my-3 d-flex justify-content-center">
    <form wire:submit.prevent='search'>
        <button type="submit" class="bg-primary text-white p-3 border-0">Search</button>
        <input type="text" wire:model.live="search" class="border-0 bg-light p-3" placeholder="Search...">
    </form>
</div>
