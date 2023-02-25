<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
class Task extends Component
{

    public $name = '';

    public $category = '';

    public $priority = '';

    public $when = '';

    public $taskId = null;

    
    public $isOpen = false;

    public function mount()
    {
        $this->tasks = TaskModel::all();
    }
    public function render()
    {
        return view('livewire.task.task');
    }


    public function create()

    {

        $this->resetInputFields();

        $this->openModal();

    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->priority = '';
        $this->category = '';
        $this->when = '';

    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'priority' => 'required'
        ]);

        $task = new TaskModel();

        if($this->taskId)
        {
            $task = TaskModel::find($this->taskId);
        }

        $task->name = $this->name;
        $task->category = $this->category;
        $task->priority = $this->priority;
        $task->when = now();

        $task->save();
    
         
        $this->tasks = TaskModel::all();
        $this->closeModal();
        $this->resetInputFields();


    }


    public function edit($taskId)
    {
        $task = TaskModel::find($taskId);
        $this->taskId = $task->id;
        $this->name = $task->name;
        $this->category = $task->category;
        $this->priority = $task->priority;

        $this->openModal();
    }
    public function delete($taskId)
    {
        $deletedTask = TaskModel::find($taskId)->delete();
        $this->tasks = TaskModel::all();

    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function openModal()
    {
        $this->isOpen  = true;
    }
}
