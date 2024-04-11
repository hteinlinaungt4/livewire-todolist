<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Todolist extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Validate('required|min:3')]
    public $task;

    public $EditId;

    #[Validate('required|min:3')]
    public $EditTask;


    public $search = '';



    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete($id){
        $task=Task::findorFail($id);
        $task->delete();
        session()->flash('delete', 'Task successfully Deleted.');
    }
    public function cancle(){
        $this->reset('EditId','EditTask');
    }

    public function toggle($id){
        $task=Task::findorFail($id);
        $task->complete = !$task->complete;
        $task->update();
    }

    public function edit($id){
        $this->EditId = $id;
        $this->EditTask = Task::find($id)->task;
    }

    public function save(){
        $validate=$this->validateOnly('task');
        Task::create($validate);

        $this->reset('task');
        session()->flash('create', 'Task successfully Created.');

    }
    public function update(){
        $this->validateOnly('EditTask');
        Task::find($this->EditId)->update(
            [
                'task' => $this->EditTask,
            ]
        );
        $this->cancle();
    }



    public function render()
    {
        return view('livewire.todolist',[
            'tasks' => Task::latest()->where('task', 'like', '%'.$this->search.'%')->paginate(2)
        ]);
    }

}
