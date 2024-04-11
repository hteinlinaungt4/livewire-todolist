{{-- Card --}}
<div wire:key="{{ $task->id }}" class="card my-3" style=" border-top:3px solid blue;">
    <div class="card-title p-3">
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-content-center">
                    @if ($task->complete)
                        <input type="checkbox" checked wire:click='toggle({{$task->id}})'>
                    @else
                        <input type="checkbox" wire:click='toggle({{$task->id}})'>
                    @endif
                   @if ($task->id == $EditId)
                      <div class="d-flex flex-col">
                        <input type="text"  wire:model='EditTask' class="form-control mx-2 shadow p-2 my-2 bg-light" placeholder="Todo...">
                        @error('EditTask')
                            <span class="text-danger my-3">{{ $message }}</span>
                        @enderror
                      </div>
                    @else
                        @if ($task->complete)
                            <h3 class="ms-2 text-decoration-line-through">{{$task->task}}</h3>
                        @else
                            <h3 class="ms-2">{{$task->task}}</h3>
                        @endif
                   @endif
                </div>
                <div>
                    <button class="btn btn-sm btn-info" wire:click.prevent='edit({{$task->id}})'>Edit</button>
                    <button class="btn btn-sm btn-danger" wire:click.prevent='delete({{$task->id}})'>Delete</button>
                </div>
            </div>
            <p>{{$task->updated_at}}</p>
            @if ($task->id == $EditId)
            <div>
                <button class="btn btn-sm btn-warning" wire:click='update'>Update</button>
                <button class="btn btn-sm btn-danger" wire:click.prevent='cancle'>Cancle</button>
            </div>
            @endif
        </div>
    </div>
</div>
