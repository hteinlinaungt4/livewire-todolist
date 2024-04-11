<div>
    @include('livewire.include.create')
    @include('livewire.include.search')
    @foreach ($tasks as $task)
        @include('livewire.include.card')
    @endforeach
    <div>
        {{ $tasks->links() }}
    </div>

</div>
