<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Task as Model;
class Task extends Component
{

    public $name = '';

    public $category = '';

    public $priority = '';

    public $description = '';

    public $when = '';

    public $taskId = null;

    
    public $isOpen = false;

    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
        $this->tasks = Model::all();
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
        $this->description = '';
        $this->category_id = null;
        $this->when = '';

    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'priority' => 'required'
        ]);

        $task = new Model();

        if($this->taskId)
        {
            $task = Model::find($this->taskId);
        }

        $task->name = $this->name;
        $task->description = $this->description;
        $task->category_id = $this->category_id;
        $task->priority = $this->priority;
        $task->when = now();

        $task->save();
    
         
        $this->tasks = Model::all();
        $this->closeModal();
        $this->resetInputFields();


    }


    public function edit($taskId)
    {
        $task = Model::find($taskId);
        $this->taskId = $task->id;
        $this->name = $task->name;
        $this->description = $task->description;
        $this->category_id = $task->category_id;
        $this->priority = $task->priority;

        $this->openModal();
    }
    public function delete($taskId)
    {
        $deletedTask = Model::find($taskId)->delete();
        $this->tasks = Model::all();

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
