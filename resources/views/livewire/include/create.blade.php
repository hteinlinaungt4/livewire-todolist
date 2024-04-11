@if (@session('create'))
<div class="alert mt-5 alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('create') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (@session('delete'))
<div class="alert mt-5 alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('delete') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    {{-- todo form  --}}
    <div class="card my-5" style=" border-top:3px solid blue;">
        <div class="card-title p-5">
            <h1>Create New Todo</h1>
            <form wire:submit.prevent='save'>
                <div class="form-group">
                    <label for="" class="my-2">Todo</label>
                    <input type="text" wire:model='task' class="form-control shadow p-2 my-2 bg-light" placeholder="Todo...">
                    @error('task')
                        <span class="text-danger my-3">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Create</button>
            </form>
        </div>
    </div>
